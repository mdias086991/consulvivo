<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DoctorNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $day, $patientName)
    {
        $this->name = $name;
        $this->day = date('d/m/Y',strtotime($day));
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
            ->subject('Nova consulta para você')
            ->markdown('emails.doctorNotification')
            ->with([
                'name' => $this->name,
                'day' => $this->day,
                'patientName' => $this->patientName,
                'link' => ''
            ]);
    }

}
