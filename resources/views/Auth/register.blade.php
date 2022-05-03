@extends('Layouts.admin')
@section('content')
<div class="card card-2 my-4" style="width: 55rem;">
  <div class="card-body">
<div class="content-principal-reg">
    <aside>   
    </aside>
    <main>
<form action="{{route('register.store')}}" method="POST">
    <h3>Registrate:</h3>
    @csrf
    <div class="form-row">
    </div>
    <div class="form-group col-md-6">
        <label >Nombre</label>
        <input name="name" type="text" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label >Apellido</label>
        <input name="apellido" type="text" class="form-control">
      </div>
    <div class="form-group col-md-6">
        <label >Email</label>
        <input name="email" type="text" class="form-control">
      </div>
    <div class="form-group col-md-6">
      <label >Direccion</label>
      <input name="direccion" type="text" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label >Telefono</label>
        <input name="telefono" type="inpuTel" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label >Contraseña</label>
        <input name="password" type="password" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label >Confirmar Contraseña</label>
        <input name="password_confirmation" type="password" class="form-control" >
      </div>
      <input name="plan" type="hidden" value="{{$registro['registro']}}">
    <button type="submit" class="btn btn-primary bt-pri">Registrar</button>
</form>
</main>
</div>
  </div>
</div>
@endsection