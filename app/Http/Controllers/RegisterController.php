<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function create(Request $request)
    {
        return view('Auth.register')->with('registro',$request);
    }
    public function store(Request $request)
    {

         /* $this->validate(\request(),[
            'email'=>'required|email',
            'password'=>'required|confirmed'
            ]);*/
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->plan=$request->plan;
            $user->direccion=$request->direccion;
            $user->telefono=$request->telefono;
            $user->apellido=$request->apellido;          
            $user->save(); 
            auth()->login($user);
            return \redirect()->to('admin');
    }
}
