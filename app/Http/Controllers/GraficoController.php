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
        
        $poks = Pokemon::all();
        $data = array();
        $cont = 0;

        foreach ($poks as $pok) {

            $obj = Tipo::find($pok->tipo1);

            if(isset($obj)) {
                $data[$cont]['tipo1'] = $obj->nome;
            }

            $obj = Tipo::find($pok->tipo2);

            if(isset($obj)) {
                $data[$cont]['tipo2'] = $obj->nome;
            }

            $cont++;
        }
    
        $total_tipos1 = array();
        $total_tipos1[0] = ['Tipos', 'Qtde de Tipos'];
        $cont = 1;

        foreach (array_count_values(array_filter(array_column($data, 'tipo'))) as $key => $value) {
            $total_tipos1[$cont] = [$key, $value];
            $cont++;
        }

        $total_tipos1 = json_encode($total_tipos1);

        $total_tipos2 = array();
        $total_tipos2[0] = ['Tipos', 'Qtde de Tipos'];
        $cont = 1;

        foreach (array_count_values(array_filter(array_column($data, 'tipo'))) as $key => $value) {
            $total_tipos2[$cont] = [$key, $value];
            $cont++;
        }

        $total_tipos2 = json_encode($total_tipos2);

        return view('grafico.index', compact(['data', 'total_tipos1', 'total_tipos2']));
    }
}
