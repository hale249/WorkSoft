<?php


namespace App\Mail;


use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $model;

    public $text;

    public $subject;

    public $code;

    public function __construct(
        string $name,
        Model $model,
        string $text = "Bạn có công việc sắp tới cần phải hoàn thành",
        string $subject = "Công việc cần phải hoàn thiện",
        int $code = 200
    )
    {
        $this->name = $name;
        $this->model = $model;
        $this->text = $text;
        $this->subject = $subject;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.custom_mail')
            ->with([
                'name' => $this->name,
                'model' => $this->model,
                'text' => $this->text,
                'code' => $this->code
            ])
            ->subject($this->subject);
    }
}
