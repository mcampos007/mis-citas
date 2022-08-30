<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Specialty;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////Ver el Scope en el modelo user
        //$doctors = User::doctors()->get();
        $doctors = User::doctors()->paginate(10);
         return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
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
       //dd($request->toArray());
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|min:7|max:8', //'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];

        $messages = [
            'name.required' => 'Se debe ingresar un nombre para el médico',
            'name.min' => 'El nombre del médico debe tener al menos tres (3) caracteres.',
            'email.required' => 'Se debe registrar un e-mail para el mmédico.',
            'email.email' => 'La direccion de emaill ingresada no es válida.',
            'dni.min' => 'El número de DNI debe tener al menos 7 números.',
            'dni.max' => 'El número´de DNI No puede tener más de 8 dígitos.',
            'address.min' => 'La dirección debe tener al menos 5 caracteres.',
            'phone.min' => 'El número telefonico debe tener al menos 6 dígitos.'
        ];
        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'dni', 'address', 'phone') +
            [
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $user->specialties()->attach($request->input('specialties'));

        $notification = "El médico se ha registrado correctamente.";
        return redirect('/doctors')->with(compact('notification'));


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
    public function edit($id)
    {
        //
        $doctor = User::doctors()->findOrFail($id);

        $specialities = Specialty::all();

        $speciality_id = $doctor->specialties()->pluck('specialties.id');

   //     dd($specialty_ids)->all();

      
        return view('doctors.edit', compact('doctor', 'specialities', 'speciality_id'));
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
         $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules);

        $user = User::doctors()->findOrFail($id);
        
        $data = $request->only('name', 'email', 'dni', 'address', 'phone') ;
        $password = $request->input('password');
        if ($password)
            $data += [ 'password' =>bcrypt($password)];

        $user ->fill($data);
        $user->save();

        $user->specialties()->sync($request->input('specialities'));

        $notification = "La información del médico se ha actualizado correctamente.";


        return redirect('/doctors')->with(compact('notification'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::doctors()->findOrFail($id);
        $doctorName = $user->name;
        $user->delete();

        $notification = "El médico $doctorName se ha eliminado correctamente.";

        return redirect('/doctors')->with(compact('notification'));
    }
}
