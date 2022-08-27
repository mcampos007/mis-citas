<?php

namespace App\Http\Controllers\Admin;
use App\User;

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
         $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules);

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
         $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        //$this->validate($request, $rules, $messages);
        $this->validate($request, $rules);

        $user = User::patients()->findOrFail($id);
        
        $data = $request->only('name', 'email', 'dni', 'address', 'phone') ;
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
        //
        $patietName = $patient->name;

        $patient->delete();

        $notification = "El paciente $patietName se ha eliminado correctamente.";

        return redirect('/patients')->with(compact('notification'));
    }
}
