<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailApproval extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Job $job)
    {
        $this->user = $user;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail_approval')
            ->with([
                'user' => $this->user,
                'job' => $this->job
            ]);
    }
}
