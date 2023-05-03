<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSheet;
use App\Models\User;
use Carbon\Carbon;

class CreateTimeSheetController extends Controller
{
    public function createEntriesForCurrentShift() {
        $current_time = Carbon::now();
        $current_time->tz('Asia/Karachi');

        // Get the current time in AM/PM format
        $current_pak_time = $current_time->format('h:i A');
        $current_pak_date = $current_time->format('d-m-Y');
        $current_pak_day = $current_time->format('l');

        // Get the users who are currently on shift
        $users_on_shift = User::where('start_time', '<=', $current_pak_time)->get();

        // Create a new entry in the timesheet table for each user on shift
        foreach ($users_on_shift as $user) {
            $createdSheets = Timesheet::where('user_id', $user->id)->where('date', $current_pak_date)->where('day', $current_pak_day)->orderBy('id', 'desc')->first();
            if (!$createdSheets) {  
                $entry = new Timesheet;
                $entry->user_id = $user->id;
                $entry->date = $current_pak_date;
                $entry->day = $current_pak_day;
                $entry->save();
            } else {
                return response()->json([
                    'success' => true,
                    'message' => count($users_on_shift) . ' entries already created.'
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => count($users_on_shift) . ' entries created successfully.'
        ]);
    }
}
