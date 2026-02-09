<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('New Contact Form Submission')
                    ->view('emails.admin-contact')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'website' => $this->data['website'] ?? 'Not provided',
                        'messageText' => $this->data['message'],
                        'ipAddress' => request()->ip(),
                        'userAgent' => request()->userAgent(),
                        'submittedAt' => now()->format('F j, Y, g:i a'),
                    ]);
    }
}