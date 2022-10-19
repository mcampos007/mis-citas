<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\ConfirmacionRegistro;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public $emailusuario;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'last_name' => ['required', 'string', 'max:255'],
            'fecha_nac' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $confirmation_code = substr(str_shuffle($permitted_chars), 0, 10);
        $data['confirmation_code'] =  $confirmation_code;
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'patient',
            'password' => Hash::make($data['password']),
            'polipriv' =>'1',
            'sexo' => $data['sexo'],
            'last_name' => $data['last_name'],
            'confirmation_code' => $confirmation_code,
            'fecha_nac' => $data['fecha_nac'],
            'dni' => $data['dni'],
        ]);

        //
        $data["mail_message"] = $data["confirmation_code"];
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

        return $user;

        //$mailto = $user->email;
        //message)"ventasonline@grupocisterna.com.ar";
        //mail::to($mailto)->send(new ConfirmacionRegistro($user));
        
        
    }
    
}
