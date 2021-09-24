<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Tasks;
use Yajra\DataTables\DataTables;

class AjaxController extends Controller
{

    public function listPessoas(Request $request){

        $filter_request = $request['filter'] ?? [];
        $whereFilter = [];

        foreach ($filter_request as $key => $filter){
            $operator = (array_key_exists('operator', $filter) ? $filter['operator'] : null);
            $value = (array_key_exists('value', $filter) ? $filter['value'] : null);
            
            if ((strlen(trim($operator)) > 0)) {
                switch ($key) {
                    case 'cargo':
                        if($value == null){
                            $operator = '!=';
                        }
                    default:
                        $key = 'pessoas.' . $key;
                }
            }

            $whereFilter[] = [$key, $operator, $value];
        }
        
        $data = Pessoa::select(['pessoas.*', 'cargos.nome as cargo_nome'])
            ->leftJoin('cargos', 'cargos.id', '=', 'pessoas.cargo')
            ->where($whereFilter)
            ->limit(100 );

        $dataTable = DataTables::of($data) 
                    ->addColumn('action', 'pessoas.action')
                    ->make(true);

        return $dataTable;
        
    }


    public function listTarefasPessoa(Request $request){

        $filter_request = $request['filter'] ?? [];
        $whereFilter = [];

        foreach ($filter_request as $key => $filter){
            $operator = (array_key_exists('operator', $filter) ? $filter['operator'] : null);
            $value = (array_key_exists('value', $filter) ? $filter['value'] : null);
            
            if ((strlen(trim($operator)) > 0)) {
                switch ($key) {
                    case 'cargo':
                        if($value == null){
                            $operator = '!=';
                        }
                    default:
                        $key = 'pessoas.' . $key;
                }
            }

            $whereFilter[] = [$key, $operator, $value];
        }
        
        $data = Pessoa::select(['pessoas.*', 'cargos.nome as cargo_nome'])
            ->leftJoin('cargos', 'cargos.id', '=', 'pessoas.cargo')
            ->where($whereFilter)
            ->limit(100 );

        $dataTable = DataTables::of($data) 
                    ->addColumn('action', 'pessoas.action')
                    ->make(true);

        return $dataTable;
        
    }



    // function TestlistTarefasPessoa(Request $request, int $id) {
    //     dd($id);
    //     $data = Tasks::join('tasks', 'tasks.id', '=', 'id')
    //     ->select('tasks.id', 'tasks.name', 'tasks.created_at')->limit(100)->get();
        
    //     return DataTables::of($data)
    //     ->addColumn('action', function($row){
    //         $d = $row['id'];
    //         $actionBtn = view('content.users.assignedActions', compact('d'))->render();
    //         return $actionBtn;
    //     })
    //     ->rawColumns(['action'])
    //     ->make(true);
    // }


    public function listTasks(Request $request){
        
        // dd($request->get('test'));
        if($request->get('funcao') == 'criador'){
            $data = Tasks::select(['tasks.*'])
                ->where('id_creater', $request->get('id'))
                ->limit(100)
                ->get();
        }
        else{
            $data = Tasks::select(['tasks.*'])
            ->where('id_assigned', $request->get('id'))
            ->limit(100)
            ->get();  
        }
        
        $dataTable = DataTables::of($data) 
                    ->addColumn('action', 'tasks.action')
                    ->make(true);
        return $dataTable;
    }


    public function listCargos(Request $request){
       
        $data = Cargo::select(['cargos.*'])
            ->limit(100)
            ->get();

        $dataTable = DataTables::of($data) 
                    ->addColumn('action', 'cargo.action')
                    ->make(true);
        return $dataTable; 
    }

        
            
}





