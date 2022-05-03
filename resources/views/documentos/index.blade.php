@extends('Layouts.admin')
@section('content')
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    
    <li class="nav-item">
      <a class="nav-link active" id="detalle-tab" data-toggle="tab" href="#detalles" role="tab" aria-controls="detalle" aria-selected="true">Detalles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="juez-tab" data-toggle="tab" href="#juez" role="tab" aria-controls="juez" aria-selected="false">Juez</a>
      </li>
    <li class="nav-item">
      <a class="nav-link" id="abogado-tab" data-toggle="tab" href="#abogado" role="tab" aria-controls="abogado" aria-selected="false">Abogados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="colaborador-tab" data-toggle="tab" href="#colaborador" role="tab" aria-controls="colaborador" aria-selected="false">Colaboradores</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="documento-tab" data-toggle="tab" href="#documento" role="tab" aria-controls="documento" aria-selected="false">Documentos</a>
      </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="detalles" role="tabpanel" aria-labelledby="detalle-tab">
      <?php
      $cont=1;
      ?>
      @foreach ($documentos as $details)
     <?php
     $casos=DB::table('expedientes')
     ->select('expedientes.*')
     ->where('nurej',$details->idExpediente)
     ->get();
     ?>
     @foreach($casos as $caso)
     @if ($cont==1)
         <label class="hide-l-i-d" for="">{{$cont=0}}</label>  
         <form action="" class="as-caso">
         <aside >
         <label  class="texto-doc-p">Numero de nurej : </label><label for="" class="texto-doc">{{$caso->nurej}}</label><br>
         <label class="texto-doc-p">Proceso :</label> <label for="" class="texto-doc">{{$caso->proceso}}</label><br>
         <label class="texto-doc-p">Procedimiento: </label>
         <label for="" >{{$caso->procedimiento}}</label><br>
         <label class="texto-doc-p">Materia: </label><label for="" class="texto-doc">{{$caso->materia}}</label><br>
         <label class="texto-doc-p">fecha recepcion:</label> <label for="" class="texto-doc">{{$caso->frecepcion}}</label><br>
         <label class="texto-doc-p">Creador: </label><label for="" class="texto-doc">{{$caso->creador}}</label><br>
       </aside>
       <main>
         <label class="texto-doc-p" >Documento</label>
         <img src="{{asset('storage/'.$caso->file)}}" alt="imagen caso" class="imgen" width="500"
         height="500">
      </main>
       </form>
    @endif
     @endforeach

     @endforeach
    </div>
    <div class="tab-pane fade" id="abogado" role="tabpanel" aria-labelledby="abogado-tab">
      <table class="table col-12">
        <thead>
          <tr>
              <th>Id</th>
              <th >Nombre</th>
              <th>Apellido</th>
          </tr>
      </thead>
      <tbody> 
    <?php
    $casos=DB::table('casos')
    ->select('casos.*')
    ->where('idexp',$details->idExpediente)
    ->get();
    ?>
    @foreach($casos as $iddetails)
    <?php
    $users=DB::table('users')
    ->select('users.*')
    ->where('id',$iddetails->idUser)
    ->get();
    ?>
     
    @foreach ($users as $user)   
      @if ($user->role=='Abogado')
      <tr>
         <td>{{$user->id}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->apellido}}</td> 
        </tr> 
         @endif
    @endforeach
    @endforeach
  </tbody>
</table>
    </div>
    <div class="tab-pane fade" id="colaborador" role="tabpanel" aria-labelledby="colaborador-tab">
      <table class="table col-12">
        <thead>
          <tr>
              <th>Id</th>
              <th >Nombre</th>
              <th>Apellido</th>
          </tr>
      </thead>
      <tbody> 
    <?php
    $casos=DB::table('casos')
    ->select('casos.*')
    ->where('idexp',$details->idExpediente)
    ->get();
    ?>
    @foreach($casos as $iddetails)
    <?php
    $users=DB::table('users')
    ->select('users.*')
    ->where('id',$iddetails->idUser)
    ->get();
    ?>
    @foreach ($users as $user)   
    <tr>
      @if ($user->role=='Colaborador')
         <td>{{$user->id}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->apellido}}</td> 
         @endif
        </tr> 
    @endforeach
    @endforeach
  </tbody>
</table>
    </div>
    <div class="tab-pane fade" id="juez" role="tabpanel" aria-labelledby="juez-tab">
      <table class="table col-12">
        <thead>
          <tr>
              <th>Id</th>
              <th >Nombre</th>
              <th>Apellido</th>
          </tr>
      </thead>
      <tbody> 
    <?php
    $casos=DB::table('casos')
    ->select('casos.*')
    ->where('idexp',$details->idExpediente)
    ->get();
    ?>
    @foreach($casos as $iddetails)
    <?php
    $users=DB::table('users')
    ->select('users.*')
    ->where('id',$iddetails->idUser)
    ->get();
    ?>
    @foreach ($users as $user)   
    <tr>
      @if ($user->role=='Juez')
         <td>{{$user->id}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->apellido}}</td> 
         @endif
        </tr> 
    @endforeach
    @endforeach
  </tbody>
</table>
    </div>
    <div class="tab-pane fade" id="documento" role="tabpanel" aria-labelledby="documento-tab">
        <table class="table col-12">
            <thead>
                <tr>
                   <th >Numero ID</th>
                    <th >Numero Nurej </th>
                    <th>Id creador</th>
                    <th>Fecha creada</th>
                    <th>Documento </th>
                    <th>Descripcion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $details)
                <tr>
                <td>{{$details->idExpediente}}</td>
                <td>{{$details->idUser}}</td>
                <td>{{$details->fcreado}}</td>
                <td>{{$details->file}}</td>
                <td>{{$details->descripcion}}</td>
                <td>
                  <form action="{{route('expedientes.ver')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="file" value="{{$details->file}}">
                    <button class="btn btn-success" type="submit">Ver</button>
                  </form> 
                </td>
                <td>
                  <form action="{{route('documentos.destroy')}} " method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="nurej" value="{{$details->idExpediente}}">
                    <input type="hidden" name="id" value="{{$details->id}}">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form> 
                </td>
              </tr>
                @endforeach  
            </tbody>
        </table>
    </div>
  </div>

@endsection