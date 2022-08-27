<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialty;



class SpecialtyController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    private function performValidation(Request $request)
    {
        // Validaciones
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'Se debe Ingresar un nombre',
            'name.min' => 'el nombre debe tener al menos 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);
    }
    public function store(Request $request)
    {
        // code...
        //dd($request->all()); => 'required|min:3',
        $this->performValidation($request);
        
        $specialty = new Specialty;
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = "Nueva Especialidad a sido registrada";
        return redirect('specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

     public function update(Request $request,  Specialty $specialty)
    {
        // code...
        //dd($request->all()); => 'required|min:3',

        // Validaciones
        $this->performValidation($request);

        // $specialty = new Specialty;
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification = "La Especialidad se actualizó correctamente.";
        return redirect('specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $nombre = $specialty->name;
        $specialty->delete();
        $notification = 'Se eliminó correctamente la Especialidad: '.$nombre;
        return redirect('specialties')->with(compact('notification'));
    }
}
