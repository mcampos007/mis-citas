<?php

namespace App\Http\Controllers;
use App\User;
use Mail;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function verify($code)
    {
        //dd($code);
        $user = User::where('confirmation_code', $code)->first();

        if (! $user)
            return redirect('/');

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/home')->with('notification', 'Has confirmado correctamente tu correo!');
    }

    public function reenviarmail()
    {
        $user = User::findOrfail(auth()->user()->id);
        $data["mail_message"] = $user->confirmation_code;
        $data["nombreusuario"] = $user->name;
        $data["txtmensaje"] = $user->confirmation_code; 
        $this->emailusuario = $user->email;

        Mail::send('emails.confirmation_code', $data, function($message)
        {
            $message
                ->to($this->emailusuario)
                ->from('thorolf@infocam.com.ar')
                ->subject('Verificación de Cuenta de Correo');
        });
        $notification = "Se Ha enviado el mail de Verificación.";
        //return view("/home")->with('notification');
        return view('home',compact('notification'));

    }
}
