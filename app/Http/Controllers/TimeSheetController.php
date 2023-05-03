<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSheet;
use App\Models\User;
use Carbon\Carbon;
use Session;


class TimeSheetController extends Controller {

    public function timesheet($id) {
        $user = User::find($id);
        $title = 'Time Sheet For '.ucfirst($user->name);

        $startTime = $user->start_time;
        $endTime = $user->end_time;
        $start = \Carbon\Carbon::parse($startTime);
        $end = \Carbon\Carbon::parse($endTime);
        $interval = $start->diffInMinutes($end);
        $intervals = ceil($interval / 30);

        // 
        $todaySheet = TimeSheet::where('user_id',$id)->latest()->first();

        return view('timesheet')->with(compact('title', 'intervals', 'start', 'todaySheet'));
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
}
