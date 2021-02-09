<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('insertar')}}" method="post">
        @csrf
        <input name="mensaje">
        <input type="submit" value="enviar">
    </form>
</body>
</html>