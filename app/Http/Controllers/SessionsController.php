<?php
use App\Models\User;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //
    public function create()
    {
        \auth()->logout();
        return view('Auth.login');
    }
    public function store()
    {
        if(auth()->attempt(request(['email','password']))==false)
        {
            return back()->withErrors([
                'message'=>'El ID o contraseña son incorrectos, ingrese nuevamente'
            ]);
        }
        else{
            return \redirect()->to('/admin');
        }  
    }
    public function destroy()
    {
        \auth()->logout();
        return \view('home');
    }
}
