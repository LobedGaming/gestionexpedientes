@extends('Layouts.admin')
@section('content')
<?php
$user=Auth::user();
        if(auth()->user()->role=='admin'){
        $expedientes = DB::table('expedientes')
        ->select('expedientes.*')
        ->where('idadmin',$user->id)
        ->get();
        }
        else {
            $expedientes=$exp;
        }
?>
@if($seleccion['crear'])
<h4 class="mt-4">Seleccione el Expediente para crear documento</h4>
@else
<h4 class="mt-4">Seleccione el Expediente para subir documento</h4>
@endif

<table class="table col-12 mt-4">
    <thead>
        <tr>
            <th >Numero</th>
            <th >Proceso</th>
            <th >Fecha Recepcion</th>
            <th>Creador</th>
            <th >Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @if (auth()->user()->role=='admin')    
        @foreach ($expedientes as $details)     
        <tr>         
            <td>{{$details->nurej}}</td>
            <td>{{$details->proceso}}</td>
            <td>{{$details->frecepcion}}</td>
            <td>{{$details->creador}}</td>
            <td>
                @if ($details->estado==true)
                    <label for="">Activo</label>
                @else
                    <label for="">Inactivo</label>
                @endif
            </td>    
            <td>
                @if($seleccion['crear'])
                <form action="{{route('documentos.editpdf')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="nurej" value="{{$details->nurej}}">
                    <button class="btn btn-primary" type="submit">Seleccionar</button>
                </form>    
                @else
                <form action="{{route('documentos.recibirCaso')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="nurej" value="{{$details->nurej}}">
                    <button class="btn btn-primary" type="submit">Seleccionar</button>
                </form>   
                @endif
            </td>             
        </tr>
        @endforeach  
      @else
        @foreach ($expedientes as $details)     
        <tr> 
           <?php
            $user=Auth::user();
            $exp = DB::table('casos')
            ->select('idexp')
            ->where('idUser',$user->id)
            ->where('idexp',$details->nurej)
            ->get();
             ?>  
            @if ($exp!='[]')
            <td>{{$details->nurej}}</td>
            <td>{{$details->proceso}}</td>
            <td>{{$details->frecepcion}}</td>
            <td>{{$details->creador}}</td>
            <td>
                @if ($details->estado==true)
                    <label for="">Activo</label>
                @else
                    <label for="">Inactivo</label>
                @endif
            </td>  
            <td>
                <form action="{{route('documentos.editpdf')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="nurej" value="{{$details->nurej}}">
                    <button class="btn btn-primary" type="submit">Seleccionar</button>
                </form>    
            </td>         
            @endif              
        </tr>
        @endforeach 
                        
        @endif 
    </tbody>
</table>
@endsection