<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Te damos la bienvenida {{$usuario->nombre}} a Selection Systems</h1>
    <p>Viendo las circunstancias de que se te a olvidado tu contraseña te suministraremos una nueva para que puedas ingresar normalmente a tu agencia de empleo de confianza.<br>
    Esperamos que estes disfrutando tu experiencia con nosotros
    </p><br>
    
    <strong>Contraseña nueva:</strong>
    <p>{{$password}}</p>
</body>
</html>