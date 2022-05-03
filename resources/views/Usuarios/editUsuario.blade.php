
@extends('Layouts.admin')
@section('content')
<form action="{{route('usuarios.reedit')}}" method="POST">
@csrf

<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Datos</th>
        </tr>
    </thead>
    <tbody class="text-left">
        @foreach ($usuario as $user)  
        <input type="hidden" name="id" value="{{$user->id}}">   
        <tr>
            <th scope="row">Nombre</th>
            <td><input name="name" type="name" class="form-control" id="name" value=" {{$user->name}}"> </td>
        </tr>
        <tr>
            <th scope="row">Apellido</th>
            <td><input name="apellido" type="tex" class="form-control" id="apellido" value=" {{$user->apellido}}"> </td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{auth()->user()->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefono</th>
            <td><input name="telefono" type="inputTel" class="form-control" id="telefono" value=" {{$user->telefono}}"> </td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td><input name="direccion" type="inputTel" class="form-control" id="direccion" value=" {{$user->direccion}}"> </td>
        </tr>
        <tr>
            <th scope="row">Rol de usuario</th>
            <td>{{$user->role}}</td>
        </tr>
        <tr>
            <th scope="row">Plan</th>
            <td > 
                <div class="titulo-head">
                    <p>
                        {{$user->plan}}
                    </p>                
                </div>
                <ul class="ref-h">
                    <button class="btn btn-warning"><a href="">Cambiar Plan</a></button>              
                </ul>
            </td>
        </tr>      
    </div>
    @endforeach
    </tbody>
</table>
<button type="submit" class="btn btn-primary mt-4">Guardar Cambios</button>
</form>
@endsection
