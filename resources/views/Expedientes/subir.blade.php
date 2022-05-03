@extends('Layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-5 bg-light" >
      <div class="card ">
        <div class="card-body">
          <h5 class="card-title">Crear documento</h5>
          <p class="card-text">Crea un nuevo documento  de tipo PDF<br>  </p>
          <form action="{{route('expedientes.elegir')}} " method="POST" class="d-inline">
           @csrf
           @if(Auth::user()->plan!='basic')
          <input type="hidden" name="crear" value="crear">
          <button class="btn btn-success" type="submit">Crear</button>
          @else
          @if(Auth::user()->role=='admin' && Auth::user()->plan=='basic' )
          <h5>CAMBIE DE PLAN PARA MAS OPCIONES</h5>
          <button class="btn btn-warning text-white" type="submit">Cambiar Plan</button>
          @endif 
          @endif 
          @if(Auth::user()->role!='admin' && Auth::user()->plan=='basic' )
          <h5>CAMBIE DE PLAN PARA MAS OPCIONES</h5>
          <button class="btn btn-warning text-white" type="submit">Retornar</button>
          @endif
          </form> 
        </div>
      </div>
    </div>
    
    <div class="col-sm-5 bg-light">
      <div class="card ">
        <div class="card-body">
          <h5 class="card-title">Subir documento</h5>
          <p class="card-text">Sube un documeto de tipo PDF,Word,Imagen</p>
          <form action="{{route('expedientes.elegir')}} " method="POST" class="d-inline">
          @csrf
          
          <input type="hidden" name="subir" value="subir">
          <button class="btn btn-success" type="submit">Subir</button>
        
            
        </form> 
        </div>
      </div>
    </div>
  </div>
@endsection