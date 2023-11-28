@extends('template.main', ['menu' => "admin", 'submenu' => "Novo Time"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<link rel="stylesheet" href="{{asset('css/create.css')}}">

<form action="{{ route('time.store') }}" method="POST" enctype="multipart/form-data">
    @csrf  
    <div class="row">
        <div class="col">
            <label for="pokemon1">Pokémon 1</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('pokemon1')) is-invalid @endif" name="pokemon1" placeholder="Pokémon 1">{{old('pokemon1')}}
                    <option value="">Selecione um pokémon</option>

                    @foreach($poks as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    
                </select>
                @if($errors->has('pokemon1'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('pokemon1') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="pokemon2">Pokémon 2</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('pokemon2')) is-invalid @endif" name="pokemon2" placeholder="Pokémon 2">{{old('pokemon2')}}
                    <option value="">Selecione um pokémon</option>

                    @foreach($poks as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    
                </select>
                @if($errors->has('pokemon2'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('pokemon2') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="pokemon3">Pokémon 3</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('pokemon3')) is-invalid @endif" name="pokemon3" placeholder="Pokémon 3">{{old('pokemon3')}}
                    <option value="">Selecione um pokémon</option>

                    @foreach($poks as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    
                </select>
                @if($errors->has('pokemon3'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('pokemon3') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="pokemon4">Pokémon 4</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('pokemon4')) is-invalid @endif" name="pokemon4" placeholder="Pokémon 4">{{old('pokemon4')}}
                    <option value="">Selecione um pokémon</option>

                    @foreach($poks as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    
                </select>
                @if($errors->has('pokemon4'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('pokemon4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="pokemon5">Pokémon 5</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('pokemon5')) is-invalid @endif" name="pokemon5" placeholder="Pokémon 5">{{old('pokemon5')}}
                    <option value="">Selecione um pokémon</option>

                    @foreach($poks as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    
                </select>
                @if($errors->has('pokemon5'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('pokemon5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="pokemon6">Pokémon 6</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('pokemon6')) is-invalid @endif" name="pokemon6" placeholder="Pokémon 6">{{old('pokemon6')}}
                    <option value="">Selecione um pokémon</option>

                    @foreach($poks as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                    
                </select>
                @if($errors->has('pokemon6'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('pokemon6') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('time.index')}}" class="btn-voltar btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Voltar
            </a>
            <button type="submit" class="btn-confirm btn btn-block align-content-center">
                Confirmar &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </button>
        </div>
    </div>
</form>

@endsection
