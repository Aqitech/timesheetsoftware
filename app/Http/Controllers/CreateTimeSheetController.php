<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSheet;
use App\Models\User;
use Carbon\Carbon;

class CreateTimeSheetController extends Controller
{
    public function createEntriesForCurrentShift() {
        $entries_created = \App\Services\ShiftManager::createEntriesForCurrentShift();

        return response()->json([
            'success' => true,
            'message' => $entries_created . ' entries created successfully.'
        ]);
    }
}
