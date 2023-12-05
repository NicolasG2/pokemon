@extends('template.main', ['menu' => "list", "submenu" => "Treinadores"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<link rel="stylesheet" href="{{asset('css/atividade.css')}}">

<div class="row mb-3 d-flex justify-content-around">
    @foreach ($data as $item)
        <div class="card mb-4" style="width: 18rem;">
            @if($item->genero == 0)<img class="label_img" src="{{ asset('img/brendan.png') }}">@endif
            @if($item->genero == 1)<img class="label_img" style="height:290px" src="{{ asset('img/may.png') }}">@endif
            <div class="card-body">
                <p class="nome fs-4 fw-bold">{{ $item['nome'] }}</p>
                <div>
                    @if($item->genero == 0)<p class="genero fs-6">Garoto</p>@endif
                    @if($item->genero == 1)<p class="genero fs-6">Garota</p>@endif
                </div>
                <span class="regiao">Região: {{ $item->regiao }}</span>
            </div>
        </div>
    @endforeach
</div>

@endsection