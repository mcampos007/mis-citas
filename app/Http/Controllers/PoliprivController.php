<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliprivController extends Controller
{
    //
    public function privacidad()
    {   
    return view('aceptaprivacidad');
    }

    public function confirmar(Request $request){
      //dd($request);
      $polipriv = $request->input('aceptar');
      return view('auth.register',compact('polipriv'));
      // return back()->with(compact('polipriv'));
       // dd($request->toArray());
    }

}
