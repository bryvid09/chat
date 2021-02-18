<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/chat.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid" id="contenedor">
        <div class="row" id="contenedor-chat">
            <div class="col-12">
                <div class="row">
                    <div class="col-3 chat-head title-list">
                        <img src={{ URL::asset('img/default.png') }} id="imagenUser">
                        <h5>Bienvenido {{ $_SESSION['user'] }}</h5>
                    </div>
                    <div class="col-9 chat-head title-chat">
                        <h3>MENSAJES</h3>
                    </div>
                </div>
                <div class="row container-message">
                    <div class="col-3 container-list-users">
                        <div class="row">
                            <div class="col-12 other-user">
                                <h6><i class="fas fa-globe-americas"></i> GENERAL</h6>
                            </div>
                        </div>
                        @forelse ($listaUsers as $item)
                            @if ($item->user != $_SESSION['user'])
                                <div class="row">
                                    <div class="col-12 other-user">
                                        <img src="{{ URL::asset('img/default.png') }}">{{ $item->user }}
                                        @if ($item->online == 'yes')
                                            <div class="green">
                                            </div>
                                        @else
                                            <div class="red">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else

                            @endif
                        @empty

                        @endforelse
                    </div>
                    <div class="col-9 container-chat">
                        <div class="row">
                            <div class="col-12">
                                <div class="historial">
                                    @forelse ($conversaciones as $key1 => $valor1)
                                        <ul>
                                            <li id="fecha"><span>{{ $key1 }}</span></li>
                                            @foreach ($valor1 as $key2 => $valor2)
                                                @foreach ($valor2 as $key3 => $valor3)
                                                    @if ($key3 == $_SESSION['user'])
                                                        <li class="content-my"><span>{{ $key3 }}: </span>
                                                            @foreach ($valor3 as $key4 => $valor4)
                                                                <span class="other-message">
                                                                    {{ $valor4 }}</span>
                                                            @endforeach
                                                        </li>
                                                    @else
                                                        <li class="content-other"><span>{{$key3}}: </span>
                                                            @foreach ($valor3 as $key4 => $valor4)
                                                                <span class="my-message">{{$valor4}}</span>
                                                            @endforeach
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row container-config-message">
                    <div class="col-3 config">

                    </div>
                    <div class="col-9 send-chat">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('insertar') }}" method="post">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-10 message">
                                            <input name="mensaje" class="input-lg form-control ">
                                        </div>
                                        <div class="col-2 text-center message">
                                            <input type="submit" value="enviar" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="container">
        <div id="mensajesConversaciones">
            <div id="conversaciones">
               
            </div>
            
        </div>
        <div id="listaUsers">
           
        </div>
    </div> --}}
</body>

</html>
