@extends('Layouts.admin')
@section('content')
@if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
@endif
<table class="table col-12">
    <thead>
        <tr>
            <th >Nombre</th>
            <th >Apellido</th>
            <th >E-mail</th>
            <th >Telefono</th>
            <th >Rol</th>
            <th >Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>          
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->apellido}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->telefono}}</td>
            <td>{{$usuario->role}}</td> 
            <td>  <ul class="">
                <form action="{{route('usuarios.editUser')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{$usuario->id}}">
                    <button class="btn btn-success" type="submit">Editar</button>
                </form>          
                <form action="{{route('usuarios.destroy')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{$usuario->id}}">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </ul>    
            </td>               
        </tr>
        @endforeach  
    </tbody>
</table>
@endsection
