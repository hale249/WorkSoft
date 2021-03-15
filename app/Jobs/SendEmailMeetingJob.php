<?php

namespace App\Jobs;

use App\Mail\EmailMeeting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\String\u;

class SendEmailMeetingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $users;

    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $users, $details)
    {
        $this->users = $users;
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->users as $user) {
            $email = new EmailMeeting($user, $this->details);
            Mail::to($user->email)->send($email);
        }
    }
}
