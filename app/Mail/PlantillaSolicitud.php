<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlantillaSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function build()
    {
        return $this->view('emails.solicutud')
                    ->subject('Nueva Solicitud');
    }
}
