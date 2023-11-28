<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Tipo;

class GraficoController extends Controller
{
    public function loadDataGraphs() {

        $poks = Pokemon::with(['id', 'tipo1', 'tipo2'])->get();

        $data = array();
        $cont = 0;

        foreach($poks as $pok) {
            $data[$cont]['tipo1'] = (Tipo::find($pok->id->tipo1))->nome;
            $data[$cont]['tipo2'] = (Tipo::find($pok->id->tipo2))->nome;
            $cont++;
        }

        $total_pokemons = array();
        $total_pokemons[0] = ['Pokemons', 'Quantidade de Pokemons'];
        $cont = 1;
        foreach (array_count_values(array_column($data, 'pokemon')) as $key => $value) {
            $total_pokemons[$cont] = [$key, $value];
            $cont++;
        }

        $total_tipos1 = array();
        $total_tipos1[0] = ['Tipos1', 'Quantidade de Tipos'];
        $cont = 1;
        foreach (array_count_values(array_column($data, 'tipo1')) as $key => $value) {
            $total_tipos1[$cont] = [$key, $value];
            $cont++;
        }

        $total_tipos2 = array();
        $total_tipos2[0] = ['Tipos2', 'Quantidade de Tipos'];
        $cont = 1;
        foreach (array_count_values(array_column($data, 'tipo2')) as $key => $value) {
            $total_tipos2[$cont] = [$key, $value];
            $cont++;
        }

        return view('grafico.index', compact(['data', 'total_pokemons', 'total_tipos1', 'total_tipos2']));
    }
}
