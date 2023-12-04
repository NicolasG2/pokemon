<?php

namespace App\Http\Controllers;

use App\Models\TimePokemon;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Tipo;
use App\Models\Time;

class GraficoController extends Controller
{
    public function loadDataGraphs() {
        
        $poks = Pokemon::select('tipo1')->union(Pokemon::select('tipo2'))->get();

        dd($poks);

        $data = array();
        $cont = 0;

        foreach ($poks as $pok) {
            $data[$cont]['tipo'] = $pok->nome;
            $cont++;
        }
    
        $total_tipos = array();
        $total_tipos[0] = ['Tipos', 'Qtde de Tipos'];
        $cont = 1;

        foreach (array_count_values(array_filter(array_column($data, 'tipo'))) as $key => $value) {
            $total_tipos[$cont] = [$key, $value];

            $cont++;
        }

        $total_tipos = json_encode($total_tipos);


        return view('grafico.index', compact(['data', 'total_tipos']));
    }
}
