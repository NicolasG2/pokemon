@extends('template.main', ['menu' => "admin", 'submenu' => "Novo Treinador"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<link rel="stylesheet" href="{{asset('../css/treinador/create.css')}}">

<form action="{{ route('treinador.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" name="nome"
                    placeholder="Nome" value="{{old('nome')}}" />
                <label for="nome">Nome</label>
                @if($errors->has('nome'))
                <div class='invalid-feedback'>
                    {{ $errors->first('nome') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label>Gênero</label>
            <div class="form-floating mb-3">
                <div class="form-check">
                    <input type="radio" id="garoto" name="genero" value="0" @if (old('genero')==0) checked @endif>
                    <label for="garoto">Garoto</label>
                    <img class="label_img" src="{{ asset('img/brendan.png') }}">
                </div>
                <div class="form-check">
                    <input type="radio" id="garota" name="genero" value="1" @if (old('genero')==1) checked @endif>
                    <label for="garota">Garota</label>
                    <img class="label_img" src="{{ asset('img/may.png') }}">
                </div>
                @if($errors->has('genero'))
                <div class='invalid-feedback'>
                    {{ $errors->first('genero') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="regiao">Região</label>
            <div class="form mb-3">
                <select class="form-control @if($errors->has('regiao')) is-invalid @endif" name="regiao"
                    placeholder="Região">{{old('regiao')}}
                    <option value="Kanto">Kanto</option>
                    <option value="Johto">Johto</option>
                    <option value="Hoenn">Hoenn</option>
                    <option value="Sinnoh">Sinnoh</option>
                    <option value="Unova">Unova</option>
                    <option value="Kalos">Kalos</option>
                    <option value="Alola">Alola</option>
                    <option value="Galar">Galar</option>
                    <option value="Paldea">Paldea</option>
                </select>
                @if($errors->has('regiao'))
                <div class='invalid-feedback'>
                    {{ $errors->first('regiao') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('treinador.index')}}" class="btn-voltar btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                </svg>
                &nbsp; Voltar
            </a>
            <button type="submit" class="btn-confirm btn btn-block align-content-center">
                Confirmar &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </button>
        </div>
    </div>
</form>

@endsection