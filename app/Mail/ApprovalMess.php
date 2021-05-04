<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalMess extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;

    protected $job;

    /**
     * ApprovalMess constructor.
     * @param string $name
     * @param Job $job
     */
    public function __construct(string $name, Job $job)
    {
        $this->name = $name;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.approval_job')
            ->with([
                'name' => $this->name,
                'job' => $this->job,
            ])
            ->subject('Thông báo phê duyệt');
    }
}
