<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $usuarios = DB::table('users')
        ->select('users.*')
        ->where('iddmin', $user->id)
        ->get();
        return \view('usuarios.index')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('usuarios.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $this->validate(\request(),[
            'name'=>'required|max:15',
            'apellido'=>'required|max:15',
            'email'=>'required|email',
            'direccion'=>'required|max:35',
            'telefono'=>'required:gte:1000',           
            ]);  
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password='123';
            $user->role=$request->role;
            $user->iddmin=\auth()->user()->id;
            $user->plan=\auth()->user()->plan;
            $user->direccion=$request->direccion;
            $user->telefono=$request->telefono;
            $user->apellido=$request->apellido;          
            $user->save(); 
            Session::flash('mensaje','Registro creado con exito');
        return \view('usuarios.register');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $user=Auth::user();
        $usuarios = DB::table('users')
        ->select('users.*')
        ->where('iddmin', $user->id)
        ->paginate(5);
        return \view('usuarios.edit')->with('usuarios',$usuarios);
    }
    
    public function buscador(Request $request)
    {
   
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request['id'];
        DB::table('users')->where('id', $id)->delete();
        $user=Auth::user();
        $usuarios = DB::table('users')
        ->select('users.*')
        ->where('iddmin', $user->id)
        ->get();
        Session::flash('mensaje','Eliminado con exito');
        return \view('usuarios.edit')->with('usuarios',$usuarios);
    }
    public function editUser(Request $request)
    {
        $id=$request['id'];
        $usuario = DB::table('users')
        ->select('users.*')
        ->where('id',$id)
        ->get();
       return \view('usuarios.editUsuario')->with('usuario',$usuario);
    }
    public function reedit(Request $request)
    {
        $id=$request->id;
        $name = $request->name;
        $apellido=$request->apellido;
        $telefono=$request->telefono;
        $direccion=$request->direccion;
        $sqlBDUpdateName = DB::table('users')
                        ->where('id',$id)
                        ->update(['name' => $name]);
        $sqlBDUpdateApellido = DB::table('users')
                        ->where('id', $id)
                        ->update(['apellido' => $apellido]);
                        $sqlBDUpdateDireccion = DB::table('users')
                        ->where('id', $id)
                        ->update(['direccion' => $direccion]);
                        $sqlBDUpdateTelefono = DB::table('users')
                        ->where('id', $id)
                        ->update(['telefono' => $telefono]);
        Session::flash('mensaje','Cambio guardado con exito');
        return redirect()->to('/admin/usuarios/edit');
    }
    public function añadiruser(Request $request)
    {
        return \view('usuarios.añadiruser')->with('nurej',$request);
    }
    public function añadiruserID(Request $request)
    {
        $user=$request['user'];
        $nurej=$request['nurej'];
        DB::table('casos')->insert(
            ['idUser' => $user,'idexp' =>$nurej]
        );
        return \view('admin.index');
    }
    
}
