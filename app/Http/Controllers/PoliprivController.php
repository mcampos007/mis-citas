<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class PoliprivController extends Controller
{
    //
    public function privacidad(Request $request)
    {   
    //  dd($request);
    return view('aceptaprivacidad');
    }

    public function confirmar(Request $request){
     //alert()->message('Sweet Alert with message.');
      //dd($request);
      $polipriv = $request->input('aceptar');
      return redirect()->back()->withInput();
      //return view('auth.register',compact('polipriv'));
     // return back()->with(compact('polipriv'));
       // dd($request->toArray());
    }

}
