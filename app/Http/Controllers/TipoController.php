<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->only(['create', 'edit', 'destroy']);
    }
    private $path = 'fotos/tipos';
    public function index()
    {
        $permissions = session('user_permissions');

        $data = Tipo::orderBy('id')->get();
        return view('tipo.index', compact('data', 'permissions'));
    }

    public function create()
    {
        return view('tipo.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'descricao' => 'required|max:255',
            'foto' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Tipo::where('nome', $request->nome)->first();
        if(isset($reg)) {

            
        } else {

            $reg = new Tipo();

            if(isset($reg)) {
                $reg->nome = $request->nome;
                $reg->descricao = $request->descricao;

                $id = $reg->id;
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $nome_arq = $id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs("public/$this->path", $nome_arq);
                $reg->foto = $this->path."/".$nome_arq;
                
                $reg->save();
            } 
            
            return redirect()->route('tipo.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dados = Tipo::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('tipo.edit', compact('dados'));
    }
  
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:255|min:3',
            'descricao' => 'required|max:255',
            'foto' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Tipo::find($id);
        
        if(isset($reg)) {
            $reg->nome = $request->nome;
            $reg->descricao = $request->descricao;
            $reg->foto = $request->foto;
            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('tipo.index');
    }

    public function destroy($id)
    {
        $reg = Tipo::find($id);

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        return redirect()->route('tipo.index');
    }
}
