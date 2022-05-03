<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
    public function index()
    {
        
        return \view('admin.index');
    }
    public function create()
    {
        return view('admin.register');
    }
    public function store()
    {
        
            $this->validate(\request(),[
                'email'=>'required|email',
                'password'=>'required|confirmed'
                ]);     
                $user =User::create(request(['email','password']));
                auth()->login($user);
                return view('admin.index');                    
    }
    public function registrar()
    {
        return \redirect()->to('store');
    }
}
