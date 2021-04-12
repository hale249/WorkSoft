<?php


namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Meeting;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function meeting(Request $request)
    {
        $meeting = Meeting::query()->where('uuid', $request->uuid)->first();

        return view('previews.meeting', compact('meeting'));
    }

    public function job(Request $request)
    {
        $job = Job::query()->where('uuid', $request->uuid)->first();

        return view('previews.job', compact('job'));
    }
}
