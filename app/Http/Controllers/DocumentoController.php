<?php

namespace App\Http\Controllers;

use App\Models\documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use PDF;
use App;
use DateTime;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->selecionar=='selecionado')
        {
            DB::table('notficaciones')->where('id', $request->id)->delete();
        }
        $nurej=$request['nurej'];
        $documentos=DB::table('documentos')
        ->select('documentos.*')
        ->where('idExpediente',$request['nurej'])
        ->get();
        return \view('documentos.index')->with('documentos',$documentos);
    }
    public function ver(Request $request)
    {
        $file=$request['file'];
        return \redirect('storage/'.$file);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        DB::table('documentos')->where('id', $request->id)->delete();
        $documentos=DB::table('documentos')
        ->select('documentos.*')
        ->where('idExpediente',$request['nurej'])
        ->get();
        return \view('documentos.index')->with('documentos',$documentos);

    }
    public function editpdf(Request $request)
    {
        /*$pdf=App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>')->save('primer.pdf');
         return $pdf->stream();*/
        return \view('documentos.editpdf')->with('nurej',$request);
    }
    public function pdf(Request $request)
    {
        $tiempo=now()->toDateTimeString();
        $searchString = " ";
        $replaceString = "";
        $originalString =now()->toDateTimeString(); 
        $outputString = str_replace($searchString, $replaceString, $originalString);
        $searchString = ":";
        $replaceString = ""; 
        $outputString = str_replace($searchString, $replaceString, $outputString);
        $final=$request->nurej.$outputString."docu.pdf";
        $pdf=App::make('dompdf.wrapper');
        $pdf=PDF::loadView('documentos.pdf',['datos'=>$request])->save('storage/'.$final);
        DB::table('documentos')->insert(
            ['idExpediente' => $request->nurej,'idUser'=>Auth::user()->id,'file' =>$final,'fcreado'=>$tiempo,'descripcion'=>$request->descripcion]
        );
        $casos=DB::table('casos')->select('casos.*')->get();
        foreach($casos as $caso)
        {
            if($caso->idexp==$request->nurej)
            {
                if($caso->idUser!=Auth::user()->id)
                {
                 DB::table('notificaciones')
                ->insert(['idUser' =>$caso->idUser,'nurej' =>$request->nurej,
                 'mensaje' =>'El '.Auth::user()->role.' '.Auth::user()->name.' ha creado un nuevo documento',
                 'estado' =>false,'nameUser'=>Auth::user()->name]);
                }
            }
        }
        return \redirect()->to('/admin');
    }
    public function recibirCaso(Request $request)
    {
        $documentos=DB::table('expedientes')
        ->select('expedientes.*')
        ->where('nurej',$request->nurej)
        ->get();
        return \view('documentos.recibir')->with('documentos',$documentos);
    }
    public function subir(Request $request)
    {
        $path=$request->file('file')->store('public');
        $s=explode("/",$path);
        $s[1];
        DB::table('documentos')->insert(
            ['idExpediente' => $request->nurej,'idUser'=>Auth::user()->id,
            'file' =>$s[1], 'fcreado'=>$request->frecepcion]
        );
        
        $casos=DB::table('casos')->select('casos.*')->get();
        foreach($casos as $caso)
        {
            if($caso->idexp==$request->nurej)
            {
                if($caso->idUser!=Auth::user()->id)
                {
                 DB::table('notificaciones')
                ->insert(['idUser' =>$caso->idUser,'nurej' =>$request->nurej,
                 'mensaje' =>'El usuario  '.Auth::user()->name.' ha subido un nuevo documento',
                 'estado' =>false,'nameUser'=>Auth::user()->name]);
                }
            }
        }
        return \redirect()->to('/admin');
    }
   
}
