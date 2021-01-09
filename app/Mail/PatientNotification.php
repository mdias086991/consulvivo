<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $doctorName)
    {
        $this->name = $name;
        $this->doctorName = $doctorName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matheus2006_dias@hotmail.com')
            ->subject('Nova consulta para você')
            ->markdown('emails.patientNotification')
            ->with([
                'name' => $this->name,
                'doctorName' => $this->doctorName,
                'link' => ''
            ]);
    }
}
