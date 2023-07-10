<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
    public function login(){
        return view('auth.login');
    }

    public function store(Request $request){
        
        $this->validate($request, [
         'email'=>'required|email',
         'password'=>'required'
        ]); 
        
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
         
         return back()->with('mensaje', 'Credenciales incorrectas');
        }

       
        return redirect()->route('posts.index', auth()->user()->username);
     }
}
