<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DispMail extends Mailable
{
    public $mailUser;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $mailUser)
    {
       $this->mailUser = $mailUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    ->from('gabriel.m.correa.s@gmail.com', 'Gabriel Moreira') //vem de gabriel
                    ->view('dispare') // oq contem no email
                    ->subject('Teste de disparo de email');
    }
}

