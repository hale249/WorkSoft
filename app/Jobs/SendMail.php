<?php


namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $queue;

    private $mailTos = [];

    private $cc = [];

    private $bcc = [];

    /**
     * @var Mailable
     */
    private $mail;

    public function __construct(array $mailTos, Mailable $mail, ?array $cc = [], ?array $bcc = [])
    {
        $this->mailTos = $mailTos;
        $this->mail = $mail;
        $this->cc = $cc;
        $this->bcc = $bcc;
    }

    public function handle()
    {
        $pendingMail = Mail::to($this->mailTos);

        if (!empty($this->cc)) {
            $pendingMail = $pendingMail->cc($this->cc);
        }

        if (!empty($this->bcc)) {
            $pendingMail = $pendingMail->bcc($this->bcc);
        }

        $pendingMail->send($this->mail);
    }
}
