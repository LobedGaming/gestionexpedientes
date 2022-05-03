<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body class="bod-g" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
    
    @if(auth()->check())
      <nav class="nav-grid">
        <div class="titulo-head">
            <p >
              <img src="{{asset('iconoG.png')}}" alt="imagen caso"  width="70"
              height="70">
             <a href="{{route('admin.index')}}" class="link-med">Gest-Exp</a>
            </p>
           
        </div>
        <ul class="ref-h">
          <?php
          $cont=0;
          $notificaciones=DB::table('notificaciones')
         ->select('notificaciones.*')
         ->where('idUser',Auth::user()->id)
         ->get();
         foreach ($notificaciones as $notificacion)
         {
           if($notificacion->estado!=true)
           {
             $cont+=1;
           } 
         } 
        ?>
       <a class="nav-link" href="{{route('notificaciones.index')}}"> <h5 class="d-inline">Notificaciones</h5> <label class="text-white notif" for="">{{$cont}}</label></a>
            <label class="mr-4">Bienvenido  <label  class="nombre-h" for="">{{auth()->user()->name}}</label> </label>
            <button class="btn btn-danger"><a href="{{route('login.destroy')}}">Salir</a></button>
        </ul>
    </nav>
    
    <div class="pos-f-t">
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.index')}}">Inicio</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Perfil</a>
              <div class="dropdown-menu">
                @if (Auth::user()->role=='admin')
                <a class="dropdown-item" href="{{route('profile.create')}}">Editar</a>
                @endif           
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('profile.index')}}">Mi Perfil</a>
              </div> 
               
                
            </li>
            @if(Auth::user()->role!='Visor')
            @if(Auth::user()->role!='Colaborador')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('usuarios.create')}}">Registrar</a>
                <a class="dropdown-item" href="{{route('usuarios.edit')}}">Editar</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('usuarios.index')}}">Inicio</a>
              </div>
            </li>
            @endif
            @endif

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Expedientes</a>
              <div class="dropdown-menu">
                @if(auth()->user()->role!='admin')
                <a class="dropdown-item"href="{{route('expedientes.index')}}">Mis casos</a>
                @endif
                @if (auth()->user()->role=='admin')
                <a class="dropdown-item" href="{{route('expedientes.create')}}">Agregar Expediente</a>
                <a class="dropdown-item" href="{{route('expedientes.subir')}}">Subir Documentos</a>
                <a class="dropdown-item" href="{{route('expedientes.edit')}}">Gestion de Expedientes</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('expedientes.index')}}">Inicio</a>
                @else @if(auth()->user()->role=='Abogado' ||auth()->user()->role=='Juez' )
                <a class="dropdown-item" href="{{route('expedientes.create')}}">Solicitar Expediente</a>
                <a class="dropdown-item" href="{{route('expedientes.subir')}}">Subir Documento</a>
               
                @endif
                @if(auth()->user()->role=='Colaborador')
                <a class="dropdown-item" href="{{route('expedientes.subir')}}">Subir Documento</a>
                @endif
                @endif          
              </div>
            </li>
          </ul>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </div>
    @else
    <nav class="nav-grid">
        <div class="titulo-head">
            <p>
              <img src="{{asset('iconoG.png')}}" alt="imagen caso"  width="70"
              height="70">
                <a href="/" class="link-med">Gest-Exp</a>
            </p>
            
        </div>
        <ul class="ref-h">
            <button class="btn btn-outline-primary"><a href="{{route('login.index')}}">Iniciar sesion</a></button>
        </ul>    
    </nav>
    @endif 
    <div class="content-principal">
      <aside>      
     </aside>
  <main>
      
        @yield('content')
  </main>
  </div>

</body>
</html>