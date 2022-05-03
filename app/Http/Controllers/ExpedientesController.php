<?php

namespace App\Http\Controllers;

use App\Models\Expedientes;
use App\Models\relacionexp;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\DocumentoController;
use App\Models\documento;

class ExpedientesController extends Controller
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
        if(auth()->user()->role=='admin'){
        $expedientes = DB::table('expedientes')
        ->select('expedientes.*')
        ->where('idadmin',$user->id)
        ->orderBy('created_at','DESC')
        ->get();
        }
        else{
            $expedientes = Expedientes::all();       
        }
        return view('Expedientes.index')->with('expedientes',$expedientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return \view('Expedientes.register');
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
        $user=Auth::user();
        $expediente=new Expedientes();       
        $expediente->nurej=$request->nurej;
        $expediente->proceso=$request->proceso;
        $expediente->procedimiento=$request->procedimiento;
        $expediente->materia=$request->materia;
        $expediente->frecepcion=$request->frecepcion;
        $expediente->creador=$user->name;
        $expediente->idcreador=$user->id;
        $path=$request->file('file')->store('public');
        $s=explode("/",$path);
        $s[1];
        $expediente->file=$s[1];
        DB::table('casos')->insert(
            ['idUser' => $user->id,'idexp' => $request->nurej]
        );
        DB::table('documentos')->insert(
            ['idExpediente' => $request->nurej,'idUser'=>Auth::user()->id,
            'file' =>$s[1], 'fcreado'=>$request->frecepcion]
        );
        if($user->role=='admin')
        {
            $expediente->idadmin=$user->id;
            $expediente->estado=true;
            Session::flash('mensaje','Registro de documento creado con exito');
        }else
        {
            $expediente->idadmin=$user->iddmin;
            $expediente->estado=\false;
            Session::flash('mensaje','Documento enviado con exito');
        }
        $expediente->save();    
        
                        


        return \redirect()->to('/admin/expedientes');
    }
    public function reedit(Request $request)
    {
        $nurej=$request->nurej;
        $proceso = $request->proceso;
        $procedimiento=$request->requerimiento;
        $materia=$request->materia;
        $path=$request->file('file')->store('public/storage/documentos/');
        $s=explode("/",$path);
        $s[1];
        $file=$s[1];
        $sqlBDUpdateName = DB::table('expedientes')
                        ->where('nurej',$nurej)
                        ->update(['proceso' => $proceso]);
        $sqlBDUpdateApellido = DB::table('expedientes')
                        ->where('nurej', $nurej)
                        ->update(['procedimiento' => $procedimiento]);
                        $sqlBDUpdateDireccion = DB::table('expedientes')
                        ->where('nurej', $nurej)
                        ->update(['materia' => $materia]);
                        $sqlBDUpdateTelefono = DB::table('expedientes')
                        ->where('nurej',$nurej)
                        ->update(['file' => $s[1]]);
        Session::flash('mensaje','Cambio guardado con exito');
        return \redirect()->to('/admin/expedientes');


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
    public function edit()
    {
        //
      /*  $user=Auth::user();
        $expedinetes = DB::table('expedientes')
        ->select('expedientes.*')
        ->where('idadmin',$user->id)
        ->get();*/
        $user=Auth::user();
        if(auth()->user()->role=='admin'){
        $expedientes = DB::table('expedientes')
        ->select('expedientes.*')
        ->where('idadmin',$user->id)
        ->orderBy('created_at','DESC')
        ->get();
        }
        else{
            $expedientes = Expedientes::all();       
        }
        return \view('Expedientes.edit')->with('expedientes',$expedientes);
    }
    public function editExpediente(Request $request)
    {
        $id=$request['id'];
        $expedientes = DB::table('expedientes')
        ->select('expedientes.*')
        ->orderBy('created_at','DESC')
        ->where('id',$id)
        ->get();
       return \view('expedientes.editExpediente')->with('expedientes',$expedientes);
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
    public function destroy(Request $request)
    {
        $id=$request['id'];
        DB::table('expedientes')->where('id', $id)->delete();
        $user=Auth::user();
        $expedientes = DB::table('expedientes')
        ->select('expedientes.*')
        ->where('idadmin', $user->id)
        ->orderBy('created_at','DESC')
        ->get();
        Session::flash('mensaje','Eliminado con exito');
        return \view('Expedientes.edit')->with('expedientes',$expedientes);
    }


    public function subir()
    {
        return view('Expedientes.subir');
    }
    public function elegir(Request $request)
    {
        $exp=Expedientes::all();
        return \view('documentos.elegir')->with('seleccion',$request)->with('exp',$exp);
    }
}
