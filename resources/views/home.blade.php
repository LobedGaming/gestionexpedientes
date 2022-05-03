@extends('Layouts.admin')
@section('title','Login-App')
@section('content')
<div class="row my-4">
<div class="card card-1" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('freeicon.png')}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Gratis</h5>
      <h2 class="card-title">$0 / mo</h2>
      <p class="card-text">15 usuarios</p>
      <p class="card-text">100mb de espacio</p>
      <p class="card-text">10 documentos por usuario</p>
      <p class="card-text">Soporte</p>
      <br><br><br><br><br>
      <form action="{{route('register.create')}}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="registro" value="basic">
        <button class="btn btn-outline-primary " type="submit"><a class="bt-free">Registrar</a></button>
       </form>  
    </div>
  </div>
  <div class="card card-2" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('proicon.png')}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Profesional</h5>
      <h2 class="card-title">$15 / mo</h2>
      <p class="card-text">30 usuarios</p>
      <p class="card-text">1GB de espacio</p>
      <p class="card-text">Crear Documentos</p>
      <p class="card-text">1GB de espacio</p>
      <p class="card-text">20 documentos por usuario</p>
      <p class="card-text">Soporte</p>
      <p class="card-text">¡Gratis 7 dias!</p>
      <form action="{{route('register.create')}}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="registro" value="pro">
        <button class="btn btn-primary text-white" type="submit"><a class="text-white"class="">Probar Ahora</a></button>
    </form>  
    </div>
  </div> 
  <div class="card card-3" style="width: 18rem;">
    <img class="card-img-top" src="{{asset('empresaicon.png')}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">EnterPrise</h5>
      <h2 class="card-title">$35 / mo</h2>
      <p class="card-text">Usuarios Ilimitados</p>
      <p class="card-text">Espacio ilimitado</p>
      <p class="card-text">Documentos ilimitados</p>
      <p class="card-text">Documentos ilimitados por usuario</p>
      <p class="card-text">Soporte email y telefonico</p>
      <br><br><br>
      <form action="{{route('register.create')}}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="registro" value="empresa">
        <button class="btn btn-warning" type="submit"><a class="text-white" >Contactanos</a></button>
    </form>  
    </div>
  </div> 
</div>
@endsection