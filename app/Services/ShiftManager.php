<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Timesheet;

class ShiftManager
{
    public static function createEntriesForCurrentShift()
    {
        $current_time = Carbon::now();
        $current_time->tz('Asia/Karachi');

        // Get the current time in AM/PM format
        $current_pak_time = $current_time->format('h:i A');
        $current_pak_date = $current_time->format('Y-m-d');
        $current_pak_day = $current_time->format('l');

        // Get the users who are currently on shift
        $users_on_shift = User::where('start_time', '=', $current_pak_time)->where('is_deleted', 'N')->where('status', 'A')->get();

        // Create a new entry in the timesheet table for each user on shift
        $entries_created = 0;
        foreach ($users_on_shift as $user) {
            $createdSheet = Timesheet::where('user_id', $user->id)->where('date', $current_pak_date)->where('day', $current_pak_day)->orderBy('id', 'desc')->first();
            if (!$createdSheet) {  
                $entry = new Timesheet;
                $entry->user_id = $user->id;
                $entry->date = $current_pak_date;
                $entry->day = $current_pak_day;
                $entry->save();
                $entries_created++;
            }
        }

        return $entries_created;
    }
}