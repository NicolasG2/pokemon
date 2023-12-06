<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Pokemon;
use App\Models\TimePokemon;
use App\Models\Treinador;
use Illuminate\Http\Request;

class TimeController extends Controller
{

    public function index()
{
    $time = TimePokemon::orderBy('id')->get();
    $team = Time::orderBy('id')->get();
    $data = array();
    $cont = 0;

    foreach ($team as $d) {
        $treinador = Treinador::find($d->id_treinador);

        $data[$cont]['id_treinador'] = $treinador->id;
        $data[$cont]['nome_treinador'] = $treinador->nome;

        $cont++;
    }

    $cont = 0;

    foreach ($time as $d) {
        $data[$cont]['id'] = $d->id;
        $data[$cont]['nome'] = $d->nome;

        $obj = Pokemon::find($d->pokemon1);
        if (isset($obj)) {
            $data[$cont]['pokemon1'] = $obj->nome;
        }

        $obj = Pokemon::find($d->pokemon2);
        if (isset($obj)) {
            $data[$cont]['pokemon2'] = $obj->nome;
        } else {
            $data[$cont]['pokemon2'] = "-";
        }

        $obj = Pokemon::find($d->pokemon3);
        if (isset($obj)) {
            $data[$cont]['pokemon3'] = $obj->nome;
        } else {
            $data[$cont]['pokemon3'] = "-";
        }

        $obj = Pokemon::find($d->pokemon4);
        if (isset($obj)) {
            $data[$cont]['pokemon4'] = $obj->nome;
        } else {
            $data[$cont]['pokemon4'] = "-";
        }

        $obj = Pokemon::find($d->pokemon5);
        if (isset($obj)) {
            $data[$cont]['pokemon5'] = $obj->nome;
        } else {
            $data[$cont]['pokemon5'] = "-";
        }

        $obj = Pokemon::find($d->pokemon6);
        if (isset($obj)) {
            $data[$cont]['pokemon6'] = $obj->nome;
        } else {
            $data[$cont]['pokemon6'] = "-";
        }

        $cont++;
    }

    return view('time.index', compact('data', 'time'));
}

    public function create()
    {
        $poks = Pokemon::orderBy('id')->get();

        $treinadores = Treinador::orderBy('nome')->get();

        return view('time.create', compact('poks', 'treinadores'));
    }

    public function store(Request $request)
    {
        $regras = [
            'id_treinador' => 'required',
            'pokemon1' => 'required',
            'pokemon2',
            'pokemon3',
            'pokemon4',
            'pokemon5',
            'pokemon6',
        ];
    
        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];
    
        $request->validate($regras, $msgs);
    
        $reg = new TimePokemon();

        $reg->pokemon1 = $request->pokemon1;
        $reg->pokemon2 = $request->pokemon2;
        $reg->pokemon3 = $request->pokemon3;
        $reg->pokemon4 = $request->pokemon4;
        $reg->pokemon5 = $request->pokemon5;
        $reg->pokemon6 = $request->pokemon6;
        $reg->save();

        $id_timePokemon = $reg->id;

        $reg = new Time();

        $reg->id_timePokemon = $id_timePokemon;
        $reg->id_treinador = $request->id_treinador;
        $reg->save();
        
        return redirect()->route('time.index');
    }
    
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $team = Time::find($id);
    
        if (!isset($team)) {
            return "<h1>ID: $id não encontrado!</h1>";
        }
    
        $timePokemon = TimePokemon::find($team->id_timePokemon);
    
        if (!isset($timePokemon)) {
            return "<h1>ID: $team->id_timePokemon não encontrado!</h1>";
        }
    
        $data = [];
    
        $data['id'] = $team->id;
    
        $treinador = Treinador::find($team->id_treinador);
    
        $data['id_treinador'] = $treinador->id;
        $data['nome_treinador'] = $treinador->nome;
    
        $poks = Pokemon::orderBy('id')->get();
    
        if (isset($timePokemon->pokemon1)) {
            $data['pokemon1'] = Pokemon::find($timePokemon->pokemon1)->nome;
        }
    
        if (isset($timePokemon->pokemon2)) {
            $data['pokemon2'] = Pokemon::find($timePokemon->pokemon2)->nome;
        } else {
            $data['pokemon2'] = "-";
        }
    
        if (isset($timePokemon->pokemon3)) {
            $data['pokemon3'] = Pokemon::find($timePokemon->pokemon3)->nome;
        } else {
            $data['pokemon3'] = "-";
        }
    
        if (isset($timePokemon->pokemon4)) {
            $data['pokemon4'] = Pokemon::find($timePokemon->pokemon4)->nome;
        } else {
            $data['pokemon4'] = "-";
        }
    
        if (isset($timePokemon->pokemon5)) {
            $data['pokemon5'] = Pokemon::find($timePokemon->pokemon5)->nome;
        } else {
            $data['pokemon5'] = "-";
        }
    
        if (isset($timePokemon->pokemon6)) {
            $data['pokemon6'] = Pokemon::find($timePokemon->pokemon6)->nome;
        } else {
            $data['pokemon6'] = "-";
        }

        return view('time.edit', compact('data', 'poks'));
    }
    

    public function update(Request $request, $id)
    {
        $regras = [
            'id_treinador' => 'required',
            'pokemon1' => 'required',
            'pokemon2',
            'pokemon3',
            'pokemon4',
            'pokemon5',
            'pokemon6',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = TimePokemon::find($id);
        
        if(isset($reg)) {
            $reg->pokemon1 = $request->pokemon1;
            $reg->pokemon2 = $request->pokemon2;
            $reg->pokemon3 = $request->pokemon3;
            $reg->pokemon4 = $request->pokemon4;
            $reg->pokemon5 = $request->pokemon5;
            $reg->pokemon6 = $request->pokemon6;
            $reg->save();

            $reg = Time::find($id);
            $reg->id_timePokemon = $reg->id;
            $reg->id_treinador = $request->id_treinador;
            $reg->save();

        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('time.index');
    }

    public function destroy($id)
    {
        $reg=Time::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        $reg=TimePokemon::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        return redirect()->route('time.index');
    }
}
