@extends('Layouts.admin')
@section('content')
@if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
@endif
<form action="{{route('expedientes.store')}}" method="POST" class="text-center"  enctype="multipart/form-data"  >
        @csrf
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputState">Tipo de Proceso</label>
            <select name="proceso" id="role" class="form-control">
              <option selected></option>
              <option>Penal</option>
              <option>Civil</option>
              <option>Constitucional</option>
              <option>Familiar</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nro. Nurej</label>
            <input name="nurej" type="number" class="form-control" id="nurej" placeholder="Ingrese el numero">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Procedimiento</label>
            <input name="procedimiento" type="text" class="form-control" id="procedimiento" placeholder="Describa el procedimineto">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Materia</label>
            <input name="materia" type="text" class="form-control" id="materia" placeholder="Describa la materia">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Fecha de recepcion</label>
            <input name="frecepcion" type="date" class="form-control" id="frecepcion" placeholder="Selecione la fecha">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Fecha limite de respuesta</label>
            <input name="frespuesta" type="date" class="form-control" id="frespuesta" placeholder="Selecione la fecha">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Documento</label>
            <input name="file" type="file" class="form-control" id="files">           
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection