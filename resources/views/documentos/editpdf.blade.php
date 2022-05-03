@extends('Layouts.admin')
@section('content')
<form method="POST" action="{{route('documentos.pdf')}}">
  @csrf
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nuemero de Expediente:  </label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nurej->nurej}}" name="nurej">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Nombre de Archivo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese Nombre">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Descripcion: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Encabezado</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="encabezado" placeholder="">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Lugar de Origen</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="Origen" placeholder="" name="Origen">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Fecha de la reunion</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="fecha" placeholder="" name="Fecha">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Hora</label>
        <div class="col-sm-10">
          <input type="time" class="form-control" id="hora" name="hora" placeholder="">
        </div>
      </div>
      <div class="input-group texto-pdf">
        <span class="input-group-text">Desarollo</span>
        <div class="input-group-prepend">    
        </div>
        <textarea class="form-control" name="desarrollo" aria-label="With textarea"></textarea>
      </div>
      <input type="hidden" name="subir" value="subir">
      <button class="btn btn-success boton-pdf" type="submit">Subir</button>

</form>


@endsection