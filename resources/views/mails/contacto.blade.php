<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Recibido</title>
</head>

<body>
	
    <p>Recibiste un mensaje de: {{ $msg['nombre'] }}</p>
    <p>a traves de {{ $msg['email'] }}</p>
    <p><strong>Celular:</strong> {{ $msg['celular'] }} </p>
    <p><strong>Asunto:</strong> {{ $msg['asunto'] }} </p>
    <p><strong>Mensaje:</strong> {{ $msg['mensaje'] }} </p>
</body>

</html>
