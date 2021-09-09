<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Libraries\SSP;
use App\Models\Cargo;

use function PHPSTORM_META\type;

class TaskController extends Controller
{
       
    public function index()
    {
        $cargos = Cargo::pluck('nome', 'id');
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks', 'cargos'));
    }

    public function create()
    {
        $pessoas = Pessoa::pluck('nome','id');
        return view('tasks.create', compact('pessoas'));
    }

    public function store(Request $request)
    {
  
        $task = $request->all();
        $validate = $this->makeRules($request, $task);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
            
        if($task = Tasks::create($request->all())){
            return redirect()->route('task.show', $task->id)->with('message', ['type' => 'success', 'msg' => 'Atualizado']);
        }
    
        return redirect()->route('task.index')->with('message', ['type'=> 'danger', 'msg' => 'Nao foi possivel fazer o update']);
        
    }

    public function edit($id)
    {
        $data = Tasks::findOrFail($id);
        $pessoas = Pessoa::pluck('nome','id');    
        return view('tasks.edit', compact('data', 'pessoas'));
    }

    public function update(Request $request, $id)
    {


        if(!$task = Tasks::findOrFail($id)){
            return redirect()->route('task.index')->
            with('message', ['type'=>'danger', 'msg' => 'Cadastro não encontrado']);
        }

        $validate = $this->makeRules($request, $task);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        
        if($task->update($request->all())){
            return redirect()->route('task.show', $task->id)->with('message', ['type' => 'success', 'msg' => 'Atualizado']);
        }

        return redirect()->route('task.index')->with('message', ['type'=> 'danger', 'msg' => 'Nao foi possivel fazer o update']);

    }

    public function destroy($id)
    {
        // dd($id);
        Tasks::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {
        $task = Tasks::findOrFail($id);
        return view('tasks.show', compact('task'));
    }


    public function makeRules(Request $request, $data = null){
        $messages = [
            'name.required' => 'Por favor informe o nome.',
            'name.min' => 'Nome inválido, mínimo de 3 caracteres',
            'name.max' => 'Nome inválido, máximo de 255 caracteres',

            'description.required' => 'Por favor informe o sobrenome.',
            'description.min' => 'Descricao inválido, mínimo de 3 caracteres',
            'description.max' => 'Descricao inválido, máximo de 255 caracteres',

            'id_creater.required' => 'Por favor informe o sobrenome.',

            'id_assigned.required' => 'Por favor informe o sobrenome.'
    ];

        $rules = [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'id_creater' => 'required',
            'id_assigned' => 'required'
        ];

        $rulesUpdate = $rules;

        return [
            'messages' => $messages,
            'rules' => $rules,
            'rulesUpdate' => $rulesUpdate 
        ];
    }

    // public function listTasks(Request $request)
    // {
    //     // DB table to use
    //     $table =  Tasks::getModel()->getTable();

    //     // Table's primary (key)
    //     $primaryKey = Tasks::getModel()->getKeyName();
        
    
    //     $columns = array(
    //         array( 'db' => 'id', 'dt' => 0 ),
    //         array(
    //             'db' => 'name',
    //             'dt' => 1,
    //             'formatter' => function ($d, $row) {
    //                 return strlen($d) > 50 ? substr($d,0,50)."..." : $d;
    //         }),
    //         array(
    //             'db' => 'description',
    //             'dt' => 2,
    //             'formatter' => function( $d, $row) {
                
    //                 if($d == null) 
    //                 {
    //                    return 'Indefinido';
    //                 }
    //                 return $d;
    //             }
    //         ),
    //         array(
    //             'db'        => 'id_creater',
    //             'dt'        => 3,
    //             'formatter' => function( $d, $row) {
                
    //                     if($d == null) 
    //                 {
    //                    return 'Indefinido';
    //                 }
    //                 return $d;
    //             }
    //         ),
            

    //         array(
    //             'db'        => 'id_assigned',
    //             'dt'        => 4,
    //             'formatter' => function( $d, $row) {
    //                 if($d == null) 
    //                 {
    //                     return 'Indefinido';
    //                 }
    //                 // dd($d);
    //                 return $d;
    //             }
    //         ),

    //     );
        
    //     // SQL server connection information
    //     $sql_details = array(
    //         'user' => 'homestead',
    //         'pass' => 'secret',
    //         'db'   => 'empresa',
    //         'host' => '127.0.0.1'
    //     );
        
        
    //     /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    //     * If you just want to use the basic configuration for DataTables with PHP
    //     * server-side, there is no need to edit below this line.
    //     */
        
    //     echo json_encode(
    //         SSP::simple( $request, $sql_details, $table, $primaryKey, $columns )
    //     );
    // }
}

