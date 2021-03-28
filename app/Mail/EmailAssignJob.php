<?php

namespace App\Mail;

use App\Models\Project;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailAssignJob extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Project $job)
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
        return $this->view('backend.mails.project')
            ->with([
                'user' => $this->user,
                'job' => $this->job
            ]);
    }
}
