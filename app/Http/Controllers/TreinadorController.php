<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treinador;

class TreinadorController extends Controller
{
    
    public function index()
    {
        $data = Treinador::orderBy('id')->get();
        return view('treinador.index', compact('data'));
    }

    public function create()
    {
        return view('treinador.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:225|min:5',
            'regiao' => 'required|max:45|min:5',
            'genero' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = new Treinador();

        if(isset($reg)) {

            $reg->nome = $request->nome;
            $reg->regiao = $request->regiao;
            $reg->genero = $request->genero;
            $reg->save();
        } 
        
        return redirect()->route('treinador.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dados = Treinador::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('treinador.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:255|min:5',
            'regiao' => 'required|max:45|min:5',
            'genero' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Treinador::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
            $reg->regiao = $request->regiao;
            $reg->genero = $request->genero;
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('treinador.index');
    }

    public function destroy($id)
    {
        $reg= Treinador::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->destroy($id);

        return redirect()->route('treinador.index');
    }
}
