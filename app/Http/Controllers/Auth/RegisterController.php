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
        $messages = [
            'name.required' => 'Se debe Ingresar un nombre',
            'name.min' => 'el nombre debe tener al menos tres letras',
            'name.max' => 'el nombre no debe tener más de 50 caracteres.',
            'email.required' => 'Se debe Ingresar un email',
            'email.email' => 'el email ingreado no es válido',
            'email.max' => 'la longitud del email no puede ser superior a 100 caracteres.',
            'password.required' => 'Se debe Ingresar una clave',
            'password.min' => 'La clave debe tener una longitud minima de 6 caracteres.',
            'fecha_nac.required' => 'Se debe Ingresar la fecha de nacimiento',
            'last_name.required' => 'Se debe Ingresar un Apellido',
            'last_name.min' => 'el apellido debe tener al menos tres letras',
            'last_name.max' => 'el apellido no debe tener más de 50 caracteres.',
            

        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'last_name' => ['required', 'string', 'min:3', 'max:50'],
            'fecha_nac' => ['required'],
            'sexo' => 'required',
            'sexo.required' => 'Se debe Ingresar el sexo',
            'dni' => 'nullable|min:7|max:11', //'nullable|digits:8',

        ], $messages);
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
