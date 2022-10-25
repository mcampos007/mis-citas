<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index()
    {
        //Ver el Scope en el modelo user
        //$patients = User::where('role','patient')->get();
        //$patients = User::patients()->get();
        $patients = User::patients()->paginate(5);
         return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'sexo.required' => 'Se debe Ingresar el sexo',
            'dni.min' => 'El número de DNI debe tener al menos 7 números.',
            'dni.max' => 'El número´de DNI No puede tener más de 11 dígitos.',
        ];
         $rules = [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'last_name' => ['required', 'string', 'min:3', 'max:50'],
            'fecha_nac' => ['required'],
            'sexo' => 'required',
            'dni' => 'nullable|min:7|max:11', //'nullable|digits:8',
        ];


        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'dni', 'address', 'phone') +
            [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = "El paciente se ha registrado correctamente.";
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $patient)
    {
        //
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $messages = [
            'name.required' => 'Se debe Ingresar un nombre',
            'name.min' => 'el nombre debe tener al menos tres letras',
            'name.max' => 'el nombre no debe tener más de 50 caracteres.',
            'email.required' => 'Se debe Ingresar un email',
            'email.email' => 'el email ingreado no es válido',
            'email.max' => 'la longitud del email no puede ser superior a 100 caracteres.',
            'fecha_nac.required' => 'Se debe Ingresar la fecha de nacimiento',
            'last_name.required' => 'Se debe Ingresar un Apellido',
            'last_name.min' => 'el apellido debe tener al menos tres letras',
            'last_name.max' => 'el apellido no debe tener más de 50 caracteres.',
            'sexo.required' => 'Se debe Ingresar el sexo',
            'dni.min' => 'El número de DNI debe tener al menos 7 números.',
            'dni.max' => 'El número´de DNI No puede tener más de 11 dígitos.',
        ];
         $rules = [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'last_name' => ['required', 'string', 'min:3', 'max:50'],
            'fecha_nac' => ['required'],
            'sexo' => 'required',
            'dni' => 'nullable|min:7|max:11', //'nullable|digits:8',
        ];

        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules,$messages);
        //dd($request);
        $user = User::patients()->findOrFail($id);
        
        $data = $request->only('name', 'email', 'dni', 'address', 'phone','sexo', 'last_name', 'fecha_nac') ;
        $password = $request->input('password');
        if ($password)
            $data += [ 'password' =>bcrypt($password)];

        $user ->fill($data);
        $user->save();

        $notification = "La información del paciente se ha actualizado correctamente.";


        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        //VErificar que no tenga citas
        $patientName = $patient->name;
        $turnos = Appointment::where('patient_id','$patient->id')->get();
        //dd($turnos->toArray());
        if (count($turnos)== 0)
        {
            

            $patient->delete();

            $notification = "El paciente $patientName se ha eliminado correctamente.";

            
        }else{

            // No se puede eliminar 
            $notification = "El paciente $patientName tiene turnos, no se puede eliminar.";
            $isdeleted = "ok";
        }
       //return redirect('/patients')->with(compact('notification','isdeleted','ok'));   
        return redirect('/patients')->with('isdeleted','ok');   
    }
        
}
