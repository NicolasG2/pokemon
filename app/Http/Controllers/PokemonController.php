<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\Tipo;

class PokemonController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->only(['create', 'edit', 'destroy']);
    }

    private $path = "fotos/pokemons";
    
    public function index()
    {
        $poks = Pokemon::orderBy('id')->get();

        $data = array();
        $cont = 0;
        foreach($poks as $d) {

            $data[$cont]['id'] = $d->id;
            $data[$cont]['nome'] = $d->nome;
            $data[$cont]['descricao'] = $d->descricao;
            $data[$cont]['foto'] = $d->foto;
            $obj = Tipo::find($d->tipo1);
            if(isset($obj)) {
                $data[$cont]['tipo1'] = $obj->nome;
            }
            $obj = Tipo::find($d->tipo2);
            if(isset($obj)) {
                $data[$cont]['tipo2'] = $obj->nome;
            }
            else {
                $data[$cont]['tipo2'] = "-";
            }
            $cont++;
        }

        return view('pokemon.index', compact('data'));
    }

    public function create()
    {

        $tipos = Tipo::orderBy('id')->get();

        return view('pokemon.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:225|min:5',
            'descricao' => 'required|max:225|min:5',
            'tipo1' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "image" => "O arquivo do campo [:attribute] deve ser uma imagem.",
            "mimes" => "O arquivo do campo [:attribute] deve ser do tipo: jpeg, png, jpg, gif, svg.",
        ];

        $request->validate($regras, $msgs);

        $reg = new Pokemon();
        $reg->nome = $request->nome;
        $reg->descricao = $request->descricao;
        $reg->tipo1 = $request->tipo1;
        $reg->tipo2 = $request->tipo2;

        if($reg->tipo1 == $reg->tipo2){
            $reg->tipo2 = null;
        }

        $reg->save();

        if ($request->hasFile('foto') && $reg->id) {
            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $nome_arq = $reg->id . '_' . time() . '.' . $extensao_arq;
            $request->file('foto')->storeAs("public/$this->path", $nome_arq);
            $reg->foto = $this->path . "/" . $nome_arq;
            $reg->save();
        }

        return redirect()->route('pokemon.index');
    }
    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $dados = Pokemon::find($id);

        $tipos = Tipo::orderBy('id')->get();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('pokemon.edit', compact('dados', 'tipos'));   
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'descricao' => 'required|max:1000|min:20',
            'tipo1' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Pokemon::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
            $reg->descricao = $request->descricao;
            $reg->tipo1 = $request->tipo1;
            $reg->tipo2 = $request->tipo2;

            if($reg->tipo1 == $reg->tipo2){
                $reg->tipo2 = null;
            }
            
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('pokemon.index');
    }

    public function destroy($id)
    {
        $reg = Pokemon::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        return redirect()->route('pokemon.index');
    }
}

