<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Libraries\SSP;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class CargosController extends Controller
{

    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargo.create');
    }


    public function store(Request $request)
    {
        $cargo = $request->all();
        $validate = $this->makeRules($request, $cargo);

        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        if($cargo = Cargo::create($request->all())){
            return redirect()->route('cargos.index', $cargo->id)->with('message', ['type' => 'success', 'msg' => 'Atualizado']);
        }
    
        return redirect()->route('cargos.index')->with('message', ['type'=> 'danger', 'msg' => 'Nao foi possivel fazer o update']);
        
    }

    
    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('cargo.edit', compact('cargo'));
    }
    
    public function update(Request $request, $id)
    {
         if(!$cargo = Cargo::findOrFail($id)){
            return redirect()->route('cargo.index')->
            with('message', ['type'=>'danger', 'msg' => 'Cadastro não encontrado']);
        }

        $validate = $this->makeRules($request, $cargo);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        
        if($cargo->update($request->all())){
            return redirect()->route('cargos.show', $cargo->id)->with('message', ['type' => 'success', 'msg' => 'Atualizado']);
        }

        return redirect()->route('cargos.index')->with('message', ['type'=> 'danger', 'msg' => 'Nao foi possivel fazer o update']);


    }
    
    public function search(Request $request)
    {
    }
    
    public function destroy($id)
    {
        Cargo::findOrFail($id)->delete();
        return redirect()->back();
    }
    
    public function show($id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('cargo.show', compact('cargo'));
    }

    public function makeRules(Request $request, $data = null){
        $messages = [
            'nome.required' => 'Por favor informe o nome.',
            'nome.min' => 'Nome inválido, mínimo de 3 caracteres',
            'nome.max' => 'Nome inválido, máximo de 255 caracteres',


    ];

        $rules = [
            'nome' => 'required|min:4|max:255',
        ];

        $rulesUpdate = $rules;


        return [
            'messages' => $messages,
            'rules' => $rules,
            'rulesUpdate' => $rulesUpdate 
        ];
    }
    

    function listCargo2(Request $request){
     
        $data = Cargo::latest()->get()->map(function($colunasdb){
            $dados = $colunasdb->only(['id', 'nome', 'setor']);
            return $dados;
        });
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $d = $row['id'];
                $actionBtn = view('cargo.action', compact('d'))->render();;
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    function indexajax()
    {
        $cargos = Cargo::pluck('nome');
        return view('cargo.indexajax', compact('cargos'));
    }

  
}
