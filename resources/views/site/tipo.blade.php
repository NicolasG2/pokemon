@extends('template.main', ['menu' => "list", "submenu" => "Tipos"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<link rel="stylesheet" href="{{asset('css/tipo.css')}}">

<div class="d-flex justify-content-around flex-wrap mt-3 mb-3">
    @foreach ($data as $item)
        <div class="card mb-4" style="width: 18rem;">
            <img src="{{ asset("storage/$item->foto")}}" height="300px" <a nohref style="cursor:pointer" onclick="showFotoModal('{{ asset('storage/') }}', '{{ $item->foto }}')">
            <div class="card-body">
                <p class="nome fs-4 fw-bold">{{ $item['nome'] }}</p>
                <p class="descricao fs-6">{{ $item['descricao'] }}</p>
            </div>
        </div>
    @endforeach
</div>

@endsection