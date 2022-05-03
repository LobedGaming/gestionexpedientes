@extends('Layouts.admin')
@section('content')
@if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
@endif
<form action="{{route('expedientes.reedit')}}" method="POST" class="text-center" enctype="multipart/form-data"> 
        @csrf
        @foreach ($expedientes as $expediente)  
        <input name="nurej" type="hidden" class="form-control" id="nurej" value="{{$expediente->nurej}}">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputState">Tipo de Proceso</label>
            <select  name="proceso" id="proceso" class="form-control" >
              <option >{{$expediente->proceso}}</option>
              @if ($expediente->proceso!='Penal')
               <option>Penal</option>
              @endif
              @if ($expediente->proceso!='Civil')
              <option>Civil</option>
             @endif
             @if ($expediente->proceso!='Constitucional')
              <option>Constitucional</option>
             @endif
             @if ($expediente->proceso!='Familiar')
              <option>Familiar</option>
              @endif
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Procedimiento</label>
            <input name="procedimiento" type="text" class="form-control" id="procedimiento" value="{{$expediente->procedimiento}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Materia</label>
            <input name="materia" type="text" class="form-control" id="materia" value="{{$expediente->materia}}">
          </div>
        </div>
       
        <div class="form-row">
          <div class="form-group col-md-6">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Documento</label>
            <input name="file" type="file" class="form-control" id="file">       
          </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Registrar</button>

</form>
@endsection