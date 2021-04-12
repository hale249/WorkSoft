<?php


namespace App\Http\Controllers;


use App\Helpers\Constant;
use App\Models\TimeTable;
use Carbon\Carbon;

class TimetableController extends ProtectedController
{
    public function index()
    {
        $timeTables = TimeTable::query()
            ->where('staff_code', $this->currentUser->staff_code)
            ->get();

        $countCredit = 0;
        foreach ($timeTables as $time) {
            $countCredit = $countCredit + $time->credit;
        }

        $credit = $countCredit * 15;

        return view('elements.timetable.index', compact('timeTables', 'credit'));
    }
}
