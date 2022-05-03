@extends('Layouts.admin')
@section('content')
<h4>Seleccione el Documento a enviar </h4>
<form action="{{route('documentos.subir')}}" method="POST" class="text-center"  enctype="multipart/form-data"  >
    @csrf
    @foreach($documentos as $documento)
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Documento</label>
      <input name="file" type="file" class="form-control" id="file"> 
      <input name="id" type="hidden" class="form-control" id="id" value="{{$documento->id}}"> 
      <input name="nurej" type="hidden" class="form-control" id="nurej" value="{{$documento->nurej}}"> 
      <input name="frecepcion" type="hidden" class="form-control" id="frecepcion" value="{{$documento->frecepcion}}">             
    </div>
  </div>
  @endforeach

  <button type="submit" class="btn btn-primary">Subir</button>
</form>
@endsection