<head>
    <label for="" class="font-weight">{{$datos->encabezado}}</label>
</head>
<body class="body-pdf">
<div>
    <label for="" class="font-weight"> <label for="">Numero de expediente : </label>  {{$datos->nurej}}</label>
    <p> <label for="" class="font-weight">Lugar de origen:</label>  {{$datos->Origen}}</p>
    <p><label for="" class="font-weight">Fecha de la reunion:</label>  {{$datos->Fecha}} </p>
    <p><label for="" class="font-weight">Hora:</label>   {{$datos->hora}}</p>
    <p class="font-weight">  Desarrollo: </p>
    <p>{{$datos->desarrollo}}</p>
</div>
</body>