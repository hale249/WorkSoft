<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailAssignJob extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $text;

    protected $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Job $job, string $text = 'Công việc mới của bạn')
    {
        $this->user = $user;
        $this->job = $job;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.job')
            ->with([
                'user' => $this->user,
                'job' => $this->job,
                'text' => $this->text
            ])
            ->subject('Công việc');
    }
}
