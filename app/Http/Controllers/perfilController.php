<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\User;

use Illuminate\Http\Request;

class perfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->toArray());
        $usuario = User::find(auth()->user()->id);
        $file = $request->file('photo');
        if ($file)
        {
            $path = public_path().'/img/theme';
            $fileName = 'fotoperfil_'.auth()->user()->id.'.png';
            $file->move($path, $fileName);
            $usuario->avatar = $fileName;
        }
        
        $usuario->name = $request->input('name'); 
        $usuario->email = $request->input('email'); 
        if ($request->input('password'))
        {
            $password =$request->input('password');
            $usuario->password = Hash::make($password); 
        }
        $usuario->dni = $request->input('dni'); 
        $usuario->address = $request->input('address'); 
        $usuario->phone = $request->input('phone'); 
        $usuario->fecha_nac = $request->input('fecha_nac');
        $usuario->sexo = $request->input('sexo');
        $usuario->tipodoc_id = $request->input('tipodoc');
        $usuario->last_name = $request->input('last_name');
        //$usuario->$request->input('role');
        //dd($usuario);
        $usuario->save();
        return redirect('/home');
        

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
        $usuario = User::findOrfail($id);
        return view('perfil.edit',compact('usuario'));
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
    }

    public function config()
    {
        if (auth()->user()->role == 'admin')
        {
            return view ('perfil.config');
        }else
        {   
            return view('home');
        }
    }

    public function manual()
    {
        return view('perfil.manual');
    }
}
