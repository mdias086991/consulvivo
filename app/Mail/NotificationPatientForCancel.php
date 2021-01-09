<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationPatientForCancel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $reason, $patientName)
    {
        $this->name = $name;
        $this->reason = $reason;
        $this->patientName = $patientName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matheus2006_dias@hotmail.com')
            ->subject('Consulta cancelada pelo médico')
            ->markdown('emails.cancel')
            ->with([
                'patientName' => $this->patientName,
                'name' => $this->name,
                'reason' => $this->reason,
                'link' => ''
            ]);
    }
}
