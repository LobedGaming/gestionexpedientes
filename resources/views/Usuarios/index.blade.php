@extends('Layouts.admin')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-center">Lista de Usuarios</a>
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
            <th >ID</th>
            <th >Nombre</th>
            <th >Apellido</th>
            <th >E-mail</th>
            <th >Telefono</th>
            <th >Rol</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>          
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->apellido}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->telefono}}</td>
            <td>{{$usuario->role}}</td>                 
        </tr>
        @endforeach  
    </tbody>
</table>

@endsection