@extends('template.main', ['menu' => "list", "submenu" => "Times"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<div class="row mb-3">
    <div class="col">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach ($data as $item)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $item['id'] }}">
                        <button class="accordion-button collapsed border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush_{{$item['id']}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="fs-5">{{ $item['nome_treinador'] }}</span>
                        </button>
                    </h2>
                    <div id="flush_{{$item['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $item['id'] }}" data-bs-parent="#accordionFlushExample">
                        <div class="d-flex justify-content-around flex-wrap mt-3">
                            @for ($i = 1; $i <= 6; $i++)
                                @if ($pokemonData = $item["pokemon{$i}"])
                                    <div class="card mb-4" style="width: 18rem; display: none;">   
                                    <img src="{{ asset('storage/' . $pokemonData['foto']) }}" height="180px" <a nohref style="cursor:pointer" onclick="showFotoModal('{{ asset('storage/') }}', '{{ $pokemonData['foto'] }}')">
                                        <div class="card-body">
                                            <p class="nome fs-4 fw-bold">{{ $pokemonData['nome'] }}</p>
                                            <p class="descricao fs-6">{{ $pokemonData['descricao'] }}</p>
                                            <p class="tipo1 fs-6">{{ $pokemonData['tipo1'] }}</p>
                                            <p class="tipo2 fs-6">{{ $pokemonData['tipo2'] }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var accordions = document.querySelectorAll('.accordion-item');

        accordions.forEach(function (accordion) {
            accordion.addEventListener('click', function () {
                var cards = this.querySelector('.accordion-collapse').querySelectorAll('.card');

                cards.forEach(function (card) {
                    card.style.display = card.style.display === 'none' ? 'block' : 'none';
                });
            });
        });
    });
</script>

@endsection
