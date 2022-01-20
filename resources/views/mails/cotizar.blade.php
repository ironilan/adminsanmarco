<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización</title>
</head>

<body>
    <p>Hola administración, {{ $msg['nombre'] }} con el RUC {{ $msg['ruc'] }}</p>
    <p>Estoy interesado en una cotización: </p>
    <p><strong>Email:</strong> {{ $msg['email'] }} </p>
    <p><strong>Mensaje:</strong> {{ $msg['mensaje'] }} </p>
</body>

</html>