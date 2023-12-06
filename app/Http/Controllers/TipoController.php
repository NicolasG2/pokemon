<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipoController extends Controller
{

    private $path = 'fotos/tipos';

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('professor', Tipo::class);

        $data = Tipo::orderBy('id')->get();
        return view('tipo.index', compact('data'));
    }

    public function create()
    {
        $this->authorize('professor', Tipo::class);

        return view('tipo.create');
    }

    public function store(Request $request)
    {
        $this->authorize('professor', Tipo::class);

        $regras = [
            'nome' => 'required|max:255|min:3',
            'descricao' => 'required|max:255|min:10',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $reg = Tipo::where('nome', $request->nome)->first();

        if(!isset($reg)) {

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
        $this->authorize('professor', Tipo::class);

        $dados = Tipo::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('tipo.edit', compact('dados'));
    }
  
    public function update(Request $request, $id)
    {
        $this->authorize('professor', Tipo::class);

        $regras = [
            'nome' => 'required|max:255|min:3',
            'descricao' => 'required|max:255|min:10',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
            
            Storage::delete("public/fotos/tipos/{$reg->foto}");

            $extensao_arq = $request->file('foto')->getClientOriginalExtension();
            $nome_arq = $id.'_'.time().'.'.$extensao_arq;
            $request->file('foto')->storeAs("public/$this->path", $nome_arq);
            $reg->foto = $this->path."/".$nome_arq;

            $reg->save();
        } else {
            return "<h1>ID: $id não encontrado!";
        }

        return redirect()->route('tipo.index');
    }

    public function destroy($id)
    {
        $this->authorize('professor', Tipo::class);

        $reg = Tipo::find($id);

        Storage::delete("public/fotos/tipos/{$reg->foto}");

        if(!isset($reg)) { return "<h1>ID: $id não encontrado!"; }

        $reg->delete();

        return redirect()->route('tipo.index');
    }
}
