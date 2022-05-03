@extends('Layouts.admin')
@section('content')
<label for="">{{$nurej->nurej}}</label>
<form  action="{{route('usuarios.añadiruserID')}} " method="POST" class="d-inline">
@csrf
<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Numero id: </label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="user" name="user" placeholder="Ingrese ID">
    </div>
  </div>    
    <input type="hidden" name="nurej" value="{{$nurej->nurej}}">
    <button class="btn btn-warning text-white" type="submit">Añadir Usuario</button>
</form>
@endsection