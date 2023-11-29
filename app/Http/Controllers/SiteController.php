<?php

namespace App\Http\Controllers;

use App\Models\Combate;
use App\Models\Pokemon;
use App\Models\Time;
use App\Models\TimePokemon;
use App\Models\Tipo;
use App\Models\Treinador;
use Illuminate\Http\Request;

class SiteController extends Controller {
    
    public function getPokemons() {
        $data = Pokemon::orderBy('id')->get();
        return view('site.pokemon', compact('data'));
    }

    public function getTimes() {
        $data = Time::orderBy('id')->get();
        return view('site.time', compact('data'));
    }

    public function getTimePokemons() {
        $data = TimePokemon::orderBy('id')->get();
        return view('site.timePokemon', compact('data'));
    }

    public function getTipos() {
        $data = Tipo::orderBy('id')->get();
        return view('site.tipo', compact('data'));
    }

    public function getTreinadors() {
        $data = Treinador::orderBy('nome')->get();
        return view('site.treinador', compact('data'));
    }

}