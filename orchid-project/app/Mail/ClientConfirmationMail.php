<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Thank You for Contacting Us')
                    ->view('emails.client-confirmation')
                    ->with([
                        'name' => $this->name,
                        'currentYear' => now()->year,
                        'companyName' => config('app.name', 'Our Company'),
                    ]);
    }
}