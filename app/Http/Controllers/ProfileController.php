<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Session;
use App\Models\User;                  //Necesario
use Illuminate\Support\Facades\Hash; //Necesario
use Illuminate\Support\Facades\DB; //Necesario
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return \view('profile.create');
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
        $user= Auth::user();
        $name = $request->name;
        $apellido=$request->apellido;
        $telefono=$request->telefono;
        $direccion=$request->direccion;
        $sqlBDUpdateName = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['name' => $name]);
        $sqlBDUpdateApellido = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['apellido' => $apellido]);
                        $sqlBDUpdateDireccion = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['direccion' => $direccion]);
                        $sqlBDUpdateTelefono = DB::table('users')
                        ->where('id', $user->id)
                        ->update(['telefono' => $telefono]);
        Session::flash('mensaje','Cambio guardado con exito');
        return redirect()->to('/admin/profile');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request )
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
}
