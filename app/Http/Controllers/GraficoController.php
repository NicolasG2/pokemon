<?php

namespace App\Http\Controllers;

use App\Models\TimePokemon;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Tipo;
use App\Models\Time;


class GraficoController extends Controller
{

    //o que eu quero fazer é pegar cada pokemon do timePokemon e então, pegar cada tipo de cada pokemon, tanto o tipo1 quanto o tipo2
    //depois de ter o tipo todo, no caso id e nome, eu quero mandar eles para poder colocar num gráfico

    public function loadDataGraphs() {
        
        $time = Time::with(['pokemon'])->get();
        dd($time);

        $data = array();
        $cont = 0;
        foreach($time as $d) {

            $data[$cont]['id'] = $d->id;
            $obj = Pokemon::find($d->pokemon1);
            if(isset($obj)) {
                $data[$cont]['tipo1'] = $obj->nome;
            }
            $obj = Pokemon::find($d->pokemon2);
            if(isset($obj)) {
                $data[$cont]['tipo2'] = $obj->nome;
            }
            else {
                $data[$cont]['tipo2'] = null;
            }
            $cont++;
        }
        dd($data);


        $total_tipos = array();
        $total_tipos[0] = ['Tipos', 'Quantidade de Tipos'];
        $total_tipos[1] = $data;
        

        $cont = 1;

        foreach (array_count_values(array_column($data, 'pokemon')) as $key => $value) {
            $total_tipos[$cont] = [$key, $value];
            $cont++;
        }

        $total_tipos = json_encode($total_tipos);
        dd($total_tipos);


        return view('grafico.index', compact(['data', 'total_tipos']));
    }
}