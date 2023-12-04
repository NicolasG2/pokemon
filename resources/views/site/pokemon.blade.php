@extends('template.main', ['menu' => "list", "submenu" => "Pokemons"])

@section('titulo') Pokemons @endsection

@section('conteudo')

<div class="row mb-3 d-flex justify-content-around">
    @foreach ($data as $item)
        <div class="card mb-4" style="width: 18rem;">
            <img src="{{ asset("storage/$item->foto")}}" height="180px"<a nohref style="cursor:pointer" onclick="showFotoModal('{{ asset('storage/') }}', '{{ $item->foto }}')">
            <div class="card-body">
                <p class="nome fs-4 fw-bold">{{ $item['nome'] }}</p>
                <p class="descricao fs-6">{{ $item['descricao'] }}</p>
                <p class="tipo1 fs-6">{{ $item['tipo1'] }}</p>
                <p class="tipo2 fs-6">{{ $item['tipo2'] }}</p>
            </div>
        </div>
    @endforeach
</div>

@endsection