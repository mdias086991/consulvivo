<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matheus2006_dias@hotmail.com')
            ->subject('Criação de uma nova conta')
            ->markdown('emails.newUser')
            ->with([
                'name' => 'Ativação de email',
                'emailUser' => $this->email,
                'name' => $this->name,
                'id' => $this->id,
                'link' => ''
            ]);
    }

}
