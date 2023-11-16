<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $data = Time::orderBy('id')->get();
        return view('time.index', compact('data'));
    }

    public function create()
    {
        return view('time.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:225|min:5',
            'regiao' => 'required|max:225|min:5'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = new Time();

        if(isset($reg)) {

            $reg->nome = $request->nome;
            $reg->regiao = $request->regiao;
            $reg->data = $request->data;
            $reg->save();
        } 
        
        return redirect()->route('time.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dados = Time::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('time.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'regiao' => 'required|max:1000|min:20',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Time::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
            $reg->regiao = $request->regiao;
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('regiao.index');
    }

    public function destroy($id)
    {
        $reg=Time::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        return redirect()->route('time.index');
    }
}
