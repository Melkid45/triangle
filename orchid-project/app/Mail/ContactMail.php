<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
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
                    ->subject('Новое сообщение с контактной формы')
                    ->view('emails.contact')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'website' => $this->data['website'] ?? 'Не указан',
                        'messageText' => $this->data['message'],
                    ]);
    }
}