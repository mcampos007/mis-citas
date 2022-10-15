<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacionRegistro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $nombreusuario;
    public $emailusuario;
    public $txtmensaje;

    public function __construct($req)
    {
        //
       // dd($req);
        $this->nombreusuario = $req->name;
        $this->emailusuario = $req->email;
        $this->txtmensaje = $req->confirmation_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmation_code')->from('thorolf@inocam.com.ar')->subject('Por favor confirma tu correo');
    }
}
