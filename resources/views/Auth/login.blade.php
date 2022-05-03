@extends('Layouts.admin')
@section('content')
<h1 class="text-center"></h1>
<form action="" method="POST" class="form-log mt-4">
    @csrf
    <div class="bg-div-log">
    <label for="">Inicio de Sesion <br></label><br>
    <input type="email" name="email" id="email" placeholder="Correo Electronico"><br>
    <input type="password" name="password" id="password" class="mt-4" placeholder="Contraseña"><br>
     @error('email')
     <p>{{$message}}</p>
     @enderror
     <br>
     <button type="submit" class="btn btn-primary">Ingresar</button>
    </div>
</form>

@endsection