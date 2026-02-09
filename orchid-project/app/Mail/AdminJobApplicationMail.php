<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AdminJobApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $mail = $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('New Job Application: ' . $this->data['job_title'])
                    ->view('emails.admin-job-application')
                    ->with($this->data);

        // Прикрепляем файл CV если он есть
        if (!empty($this->data['cv_path']) && Storage::disk('public')->exists($this->data['cv_path'])) {
            $mail->attach(
                Storage::disk('public')->path($this->data['cv_path']),
                ['as' => $this->data['cv_name'] ?? 'CV.pdf']
            );
        }

        return $mail;
    }
}