@extends('Layouts.admin')
@section('content')
@if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
@endif
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-center">Lista de Expedientes</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"></li>
        <li class="nav-item"></li>
        <li class="nav-item dropdown">
         <div class="dropdown-menu" aria-labelledby="navbarDropdown"> </div></li>
        <li class="nav-item"> 
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Ingrese ID" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
  <table class="table col-12">
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
                <ul class="">
                    <form action="{{route('documentos.index')}} " method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="nurej" value="{{$details->nurej}}">
                        <button class="btn btn-primary" type="submit">Ver</button>
                    </form>   
                    <form action="{{route('expedientes.editExpediente')}} " method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{$details->id}}">
                        <button class="btn btn-success" type="submit">Editar</button>
                    </form>  
                    <form action="{{route('usuarios.añadiruser')}} " method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="nurej" value="{{$details->nurej}}">
                        <button class="btn btn-warning text-white" type="submit">Añadir Usuario</button>
                    </form>
                       
                    <form action="{{route('expedientes.destroy')}} " method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{$details->id}}">
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    
                </ul>     
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
                 <ul class="">
                <form action="{{route('documentos.index')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="nurej" value="{{$details->nurej}}">
                    <button class="btn btn-primary" type="submit">Ver</button>
                </form>            
            </ul>    
            </td> 
            @endif              
        </tr>
        @endforeach  
        
                 
        @endif 
    </tbody>
</table>
@endsection


  

