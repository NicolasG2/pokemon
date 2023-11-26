@extends('template.main', ['menu' => "home", "submenu" => "Principal"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<link rel="stylesheet" href="{{asset('css/index.css')}}">

<div class="container">
    <div class="row">
        <div class="card text-center">
            <div class="card-header text-white">
                Pokémons
            </div>
            <div class="card-body">
                <a href="{{route('site.pokemon')}}" class="backhover dropdown-item">
                    <img class="card_img" src="./img/pikachu.png">
                    <path
                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <div class="card-header text-white">
                Times
            </div>
            <div class="card-body">
                <a href="{{route('site.time')}}" class="backhover dropdown-item">
                    <img class="card_img" src="./img/rocket.png">
                    <path
                        d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <div class="card-header text-white">
                Tipos
            </div>
            <div class="card-body">
                <a href="{{route('site.tipo')}}" class="backhover dropdown-item">
                    <img class="card_img" src="./img/firetype.png">
                    <path
                        d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <div class="card-header text-white">
                Treinadores
            </div>
            <div class="card-body">
                <a href="{{route('site.treinador')}}" class="backhover dropdown-item">
                    <img class="card_img" src="./img/treinador.png">
                    <path
                        d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection