<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var $resetPasswordToken
     */
    private $resetPasswordToken;

    /**
     * @var $email
     */
    private $email;

    /**
     * Create a new message instance.
     *
     * @param string $resetPasswordToken
     * @param string $email
     * @return void
     */
    public function __construct(string $resetPasswordToken, string $email)
    {
        $this->resetPasswordToken = $resetPasswordToken;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.reset_password')
            ->subject('Reset Password Notification')
            ->with([
                'resetPasswordToken' => $this->resetPasswordToken,
                'email' => $this->email
            ]);
    }
}
