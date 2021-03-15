<?php

namespace App\Mail;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailMeeting extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $meeting;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Meeting $meeting)
    {
        $this->user = $user;
        $this->meeting = $meeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mails.meeting')
            ->with([
                'user' => $this->user,
                'meeting' => $this->meeting
            ]);
    }
}
