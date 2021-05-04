<?php

namespace App\Jobs;

use App\Mail\ApprovalMess;
use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ApprovalMessJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;

    public $job;

    /**
     * ApprovalMessJob constructor.
     * @param string $email
     * @param Job $job
     */
    public function __construct(string $email, Job $job)
    {
        $this->email = $email;
        $this->job = $job;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new ApprovalMess($this->email, $this->job));
    }
}
