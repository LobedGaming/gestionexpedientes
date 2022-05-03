
@extends('Layouts.admin')
@section('content')
@if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
@endif
<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Datos</th>
        </tr>
    </thead>
    <tbody class="text-left">
        <tr>
            <th scope="row">Nombre</th>
            <td>{{auth()->user()->name}}</td>
        </tr>
        <tr>
            <th scope="row">Apellido</th>
            <td>{{auth()->user()->apellido}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{auth()->user()->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefono</th>
            <td>{{auth()->user()->telefono}}</td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td>{{auth()->user()->direccion}}</td>
        </tr>
        <tr>
            <th scope="row">Rol</th>
            <td>{{auth()->user()->role}}</td>
        </tr>
        <tr>
            <th scope="row">Plan</th>
            <td>{{auth()->user()->plan}}</td>
        </tr>      
    </tbody>
</table>
@endsection