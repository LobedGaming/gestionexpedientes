@extends('Layouts.admin')
@section('content')
@if (Session::has('mensaje'))
    <div class="alert alert-info my-5">
        {{Session::get('mensaje')}}
    </div>
@endif
<form action="{{route('usuarios.store')}}" method="POST" class="text-center">
        @csrf
        <form action="">
        <div class="form-row">
          <div class="col">
            <label for="">Nombre</label>
            <input name="name" type="text" id="name" class="form-control" placeholder="Nombre">
          </div>
          <div class="col">
            <label for="">Apellido</label>
            <input name="apellido" type="text" id="apellido" class="form-control" placeholder="Apellido">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Direccion</label>
          <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Calle X, Barrio X, #10 ">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Telefono</label>
            <input name="telefono" type="inpuTel" class="form-control" id="telefono" placeholder="#">
          </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputState">Cargo</label>
            <select name="role" id="role" class="form-control">
              <option selected></option>
              @if(Auth::user()->role!='Juez')
              <option>Juez</option>
              @endif
              @if(Auth::user()->role!='Abogado')
              <option>Abogado</option>
              @endif
              <option>Colaborador</option>
              <option>Visor</option>
            </select>
          </div>
        </div>
        <?php
        $registros=DB::table('users')->select('users.*')
        ->where('iddmin',Auth::user()->id)
        ->get();
        $cont=1;
        foreach ($registros as $resgistrados) {
          $cont+=1;
        } 
        ?>
    @if(Auth::user()->plan=='basic'&&Auth::user()->role=='admin' && $cont<=5)
      <button type="submit" class="btn btn-primary">Registrar</button>
    @elseif(Auth::user()->plan=='basic'&& Auth::user()->role=='admin')
    <a class="btn btn-warning">Cambiar Plan</a>
    @endif

    @if(Auth::user()->plan=='basic'&&Auth::user()->role!='admin' && $cont<=3)
    <button type="submit" class="btn btn-primary">Registrar</button>
    @elseif(Auth::user()->plan=='basic'&&Auth::user()->role!='admin' )
    <a class="btn btn-warning">Retornar</a>
    @endif

    @if(Auth::user()->plan=='pro'&&Auth::user()->role=='admin' && $cont<=10)
      <button type="submit" class="btn btn-primary">Registrar</button>
    @elseif(Auth::user()->plan=='pro'&&Auth::user()->role=='admin' )
    <a class="btn btn-warning">Cambiar Plan</a>
    @endif
    @if(Auth::user()->plan=='pro' &&Auth::user()->role!='admin' && $cont<=5)
    <button type="submit" class="btn btn-primary">Registrar</button>
    @elseif(Auth::user()->plan=='pro'&&Auth::user()->role!='admin')
    <a class="btn btn-warning">Retornar</a>
    @endif
    @if(Auth::user()->plan=='enterpise')
    <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>
@endsection