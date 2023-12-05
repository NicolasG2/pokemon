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
        
        $poks = Pokemon::orderBy('id')->get();
        $data = array();
        $cont = 0;

        foreach($poks as $p) {
            $data[$cont]['nome'] = $p->nome;
            $data[$cont]['descricao'] = $p->descricao;
            $data[$cont]['foto'] = $p->foto;
        
            $tipo1 = Tipo::find($p->tipo1);
            $data[$cont]['tipo1'] = $tipo1 ? $tipo1->nome : '-';
        
            $tipo2 = Tipo::find($p->tipo2);
            $data[$cont]['tipo2'] = $tipo2 ? $tipo2->nome : '-';
        
            $cont++;
        }
        

        //$obj->nome;
        //$obj['nome'];
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