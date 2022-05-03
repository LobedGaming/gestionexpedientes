@extends('Layouts.admin')
@section('content')
<?php
$cont=0;
$notificaciones=DB::table('notificaciones')
->select('notificaciones.*')
->where('idUser',Auth::user()->id)
->get();
?>
@foreach ($notificaciones as $notificacion)
@if($notificacion->estado!=true)    
<div>
    <div class="card">
        <h5 class="card-header">Notificacion del caso  {{$notificacion->nurej}}</h5>
        <div class="card-body">
          <h5 class="card-title">Mensaje de {{$notificacion->nameUser}}: </h5>
          <p class="card-text"> {{$notificacion->mensaje}}</p>
          <form action="{{route('documentos.index')}} " method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{$notificacion->id}}">
            <input type="hidden" name="selecionar" value="selecionado">
            <button class="btn btn-primary" type="submit" id="click">Ver</button>
        </form> 

        </div>

      </div>
      <?php
      $cont=1;
      ?>
</div>
@endif
@endforeach
@if($cont==0)
<h3 class="text-center my-5">¡No hay nuevas notificaciones!</h3>
@endif

@endsection