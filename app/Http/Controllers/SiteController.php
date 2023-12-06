<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pokemon;
use App\Models\Time;
use App\Models\TimePokemon;
use App\Models\Tipo;
use App\Models\Treinador;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getPokemons()
    {
        $poks = Pokemon::orderBy('id')->get();
        $data = array();
        $cont = 0;

        foreach ($poks as $p) {
            $data[$cont]['nome'] = $p->nome;
            $data[$cont]['descricao'] = $p->descricao;
            $data[$cont]['foto'] = $p->foto;

            $tipo1 = Tipo::find($p->tipo1);
            $data[$cont]['tipo1'] = $tipo1 ? $tipo1->nome : '-';

            $tipo2 = Tipo::find($p->tipo2);
            $data[$cont]['tipo2'] = $tipo2 ? $tipo2->nome : '-';

            $cont++;
        }

        return view('site.pokemon', compact('data'));
    }

    public function getTimes()
    {
        $times = TimePokemon::orderBy('id')->get();
        $data = array();

        foreach ($times as $time) {
            $team = Time::find($time->id);
            $treinador = Treinador::find($team->id_treinador);

            $data[] = [
                'id' => $team->id,
                'id_treinador' => $treinador->id,
                'nome_treinador' => $treinador->nome,
                'pokemon1' => $this->getPokemonData($time->pokemon1),
                'pokemon2' => $this->getPokemonData($time->pokemon2),
                'pokemon3' => $this->getPokemonData($time->pokemon3),
                'pokemon4' => $this->getPokemonData($time->pokemon4),
                'pokemon5' => $this->getPokemonData($time->pokemon5),
                'pokemon6' => $this->getPokemonData($time->pokemon6),
            ];
        }

        return view('site.time', compact('data'));
    }

    private function getPokemonData($pokemonId)
    {
        $pokemon = Pokemon::find($pokemonId);

        if ($pokemon) {
            $tipo1 = Tipo::find($pokemon->tipo1);
            $tipo2 = Tipo::find($pokemon->tipo2);

            return [
                'nome' => $pokemon->nome,
                'descricao' => $pokemon->descricao,
                'foto' => $pokemon->foto,
                'tipo1' => $tipo1 ? $tipo1->nome : '-',
                'tipo2' => $tipo2 ? $tipo2->nome : '-',
            ];
        }

        return null;
    }


    public function getTipos()
    {
        $data = Tipo::orderBy('id')->get();
        return view('site.tipo', compact('data'));
    }

    public function getTreinadors()
    {
        $data = Treinador::orderBy('nome')->get();
        return view('site.treinador', compact('data'));
    }
}