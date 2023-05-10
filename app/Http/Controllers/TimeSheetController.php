<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\TimeSheet;
use App\Models\User;
use Carbon\Carbon;
use Session;
use DB;

class TimeSheetController extends Controller {

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function timesheet($id) {
        $user = User::find($id);
        $title = 'Time Sheet For '.ucfirst($user->name);

        $startTime = $user->start_time;
        $endTime = $user->end_time;
        $start = \Carbon\Carbon::parse($startTime);
        $end = \Carbon\Carbon::parse($endTime);

        // Check if end time is earlier than start time and adjust if necessary
        if ($end->lt($start)) {
            $end->addDay();
        }

        $interval = $start->diffInMinutes($end);
        $intervals = ceil($interval / 30);

        // 
        $todaySheet = TimeSheet::where('user_id',$id)->latest()->first();

        if ($todaySheet === null) {
            Session::flash('error', 'Your time sheet not generated yet!');

            return redirect()->back();
        } else {
            return view('timesheet')->with(compact('title', 'intervals', 'start', 'todaySheet'));
        }

    }

    public function addtimesheet($id, Request $request) {
        $timeSheet = TimeSheet::find($id);
        foreach ($request->all() as $fieldName => $fieldValue) {
            // Check if the field value is not empty
            if (!empty($fieldValue) && $fieldName !== '_token') {
                $timeSheet->{$fieldName} = $fieldValue;
            }
        }
        $timeSheet->save();
        Session::flash('success', 'Your time sheet updated!');

        return redirect()->back();
    }

    public function edittimesheet($id, Request $request) {
        $timeSheet = TimeSheet::find($id);
        foreach ($request->all() as $fieldName => $fieldValue) {
            // Check if the field value is not empty
            if ($fieldName !== '_token') {
                $timeSheet->{$fieldName} = $fieldValue;
            }
        }
        $timeSheet->save();
        Session::flash('success', 'Your time sheet updated!');

        return redirect()->back();
    }

    public function admin_report() {
        $users = User::where(['is_deleted' => 'N', 'status' => 'A'])->get();
        $title = 'Report';
        
        return view('report')->with(compact('title', 'users'));
    }

    public function user_search(Request $request) {
        $user = User::where(['id' => $request->userId, 'status' => 'A', 'is_deleted' => 'N'])->first();
        $startTime = $user->start_time;
        $endTime = $user->end_time;
        $start = \Carbon\Carbon::parse($startTime);
        $end = \Carbon\Carbon::parse($endTime);

        // Check if end time is earlier than start time and adjust if necessary
        if ($end->lt($start)) {
            $end->addDay();
        }

        $interval = $start->diffInMinutes($end);
        $intervals = ceil($interval / 30);
        $thTags = '';
        for ($i = 0; $i < $intervals; $i++) {
            $startInterval = $start->copy()->addMinutes($i * 30)->format('h:i A');
            $endInterval = $start->copy()->addMinutes(($i + 1) * 30)->format('h:i A');
            $thTags .= "<th>$startInterval to $endInterval</th>";
        }

        $fromDateObj = Carbon::createFromFormat('j F, Y', $request->fromDate);
        $fromDate = $fromDateObj->format('Y-m-d');
        $toDateObj = Carbon::createFromFormat('j F, Y', $request->toDate);
        $toDate = $toDateObj->format('Y-m-d');
        $userId = $request->userId;

        $results = DB::table('time_sheets')->where('user_id', '=', $userId)->whereDate('date', '>=', $fromDate)->whereDate('date', '<=', $toDate)->get();
        if ($results->isEmpty()) {
            return response()->json(['message' => 'No results found']);
        } else {
            $data = [
                'results' => $results,
                'everyThirtyMin' => $thTags
            ];

            return response()->json($data);
        }
    }
}
