<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationPatientForApprove extends Mailable
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
        return $this->from(env('MAIL_USERNAME'))
            ->subject('Consulta aprovada')
            ->markdown('emails.approve')
            ->with([
                'patientName' => $this->patientName,
                'name' => $this->name,
                'day' => $this->day,
                'link' => ''
            ]);
    }
}
