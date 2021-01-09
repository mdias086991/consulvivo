<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlterInformation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $oldday, $newDay, $patientName)
    {
        $this->name = $name;
        $this->newDay = date('d/m/Y',strtotime($newDay));
        $this->oldday = date('d/m/Y',strtotime($oldday));
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
        ->markdown('emails.alter')
        ->with([
            'name' => $this->name,
            'newDay' => $this->newDay,
            'oldday' => $this->oldday,
            'patientName' => $this->patientName,
            'link' => ''
        ]);
    }
}
