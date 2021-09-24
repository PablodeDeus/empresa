<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Libraries\SSP;
use App\Models\Cargo;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class PessoasController extends Controller
{

    public function index()
    {
        $cargos = Cargo::pluck('nome', 'id');
       
        return view('pessoas.index', compact('cargos'));
    
    }

    public function create()
    {
        $cargos = Cargo::pluck('nome', 'id');
        $setor = Cargo::pluck('setor', 'id');
        return view('pessoas.create', compact('cargos', 'setor'));
    }
    
    public function store(Request $request)
    {
        $pessoa = $request->all();
        $validate = $this->makeRules($request, $pessoa);
        
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        if($pessoa = Pessoa::create($request->all())){
            return redirect()->route('pessoas.index', $pessoa->id)->with('message', ['type' => 'success', 'msg' => 'Atualizado']);
        }
        
        return redirect()->route('pessoas.index')->with('message', ['type'=> 'danger', 'msg' => 'Nao foi possivel fazer o update']);
        
    }
    
    
    public function edit($id)
    {
        $cargos = Cargo::pluck('nome', 'id');
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa', 'cargos'));
    }
    
    public function update(Request $request, $id)
    {
        if(!$pessoa = Pessoa::findOrFail($id)){
            return redirect()->route('pessoa.index')->
            with('message', ['type'=>'danger', 'msg' => 'Cadastro não encontrado']);
        }
        
        $validate = $this->makeRules($request, $pessoa);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        
        if($pessoa->update($request->all())){
            return redirect()->route('pessoas.show', $pessoa->id)->with('message', ['type' => 'success', 'msg' => 'Atualizado']);
        }
        
        return redirect()->route('pessoa.index')->with('message', ['type'=> 'danger', 'msg' => 'Nao foi possivel fazer o update']);
        
    }
    
    public function search(Request $request)
    {
        return view('pessoas.search');
    }
    
    public function destroy($id)
    {
        Pessoa::findOrFail($id)->delete();
        return redirect()->back();
    }
    
    public function show($id)
    {
        $data = Pessoa::findOrFail($id);
        // dd($pessoa->tarefasRecebidas);
        return view('pessoas.show', compact('data'));
    }
    
    public function makeRules(Request $request, $data = null){
        $messages = [
            'nome.required' => 'Por favor informe o nome.',
            'nome.min' => 'Nome inválido, mínimo de 3 caracteres',
            'nome.max' => 'Nome inválido, máximo de 255 caracteres',
            
            'email.required' => 'Por favor informe o email.',
            'email.min' => 'Email inválido, mínimo de 3 caracteres',
            'email.max' => 'Email inválido, máximo de 255 caracteres',
            
            'telefone.required' => 'Por favor informe a telefone.',
            'telefone.min' => 'Telefone inválida, máximo de 8 caracteres',
            'telefone.max' => 'Telefone inválida, máximo de 11 caracteres',
            
            'cargo.required' => 'Nome inválido, máximo de 255 caracteres',
            
            'setor.required' => 'Por favor informe o setor.',
            
        ];
        
        $rules = [
            'nome' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'telefone' => 'required|min:8|max:11',
            'cargo' => 'required|max:255',
            'setor' => 'required'
        ];
        
        $rulesUpdate = $rules;
        
            return [
                'messages' => $messages,
                'rules' => $rules,
                'rulesUpdate' => $rulesUpdate 
            ];
    }
       
            
}
