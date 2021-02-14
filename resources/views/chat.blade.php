<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="container">
        <div id="mensajesConversaciones">
            <div id="conversaciones">
                @forelse ($conversaciones as $key1 => $valor1)
                    <div id="fechas">
                        <div id="tituloFecha">
                            <h3>{{ $key1 }}</h3>
                        </div>
                        @foreach ($valor1 as $key2 => $valor2)
                            <div id="mensajes">
                                @foreach ($valor2 as $key3 => $valor3)
                                    <p>{{ $key3 }}
                                        @foreach ($valor3 as $key4 => $valor4)
                                            {{ $valor4 }}
                                        @endforeach

                                @endforeach
                                {{ substr($key2, 0, 5) }}</p>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <p>Bienvenido</p>
                @endforelse
            </div>
            <form action="{{ route('insertar') }}" method="post">
                @csrf
                <input name="mensaje">
                <input type="submit" value="enviar">
            </form>
        </div>
        <div id="listaUsers">
            @forelse ($listaUsers as $item)
                <p>{{$item->user}}</p>
            @empty
                
            @endforelse
        </div>
    </div>
</body>

</html>
