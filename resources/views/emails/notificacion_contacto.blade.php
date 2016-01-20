<html>
<body>

  Hola {{ $contacto->nombre }}, hemos recivido su solicitud de contacto para el productor <b>{{ $productor->nombre }}</b><br><br>

  {{ $contacto->mensaje }}


</body>
</html>
