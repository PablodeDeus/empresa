<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Tasks;
use Yajra\DataTables\DataTables;

class AjaxController extends Controller
{

    function listPessoas(Request $request){

        $filter_request = $request['filter'] ?? [];
        $whereFilter = [];

        foreach ($filter_request as $key => $filter){
            $operator = (array_key_exists('operator', $filter) ? $filter['operator'] : null);
            $value = (array_key_exists('value', $filter) ? $filter['value'] : null);
            
            if ((strlen(trim($operator)) > 0) && (strlen(trim($value)) > 0)) {
                switch ($key) {
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


    function listTasks(Request $request){
       
        $data = Tasks::select(['tasks.*'])
            ->limit(100)
            ->get();

        $dataTable = DataTables::of($data) 
                    ->addColumn('action', 'tasks.action')
                    ->make(true);
        return $dataTable;
        
    }

    function listCargos(Request $request){
       
        $data = Cargo::select(['cargos.*'])
            ->limit(100)
            ->get();

        $dataTable = DataTables::of($data) 
                    ->addColumn('action', 'cargo.action')
                    ->make(true);
        return $dataTable;
        
    }
        
            
}







// function listTasks(Request $request){

//     $filter_request = $request['filter'] ?? [];
//     $whereFilter = [];

//     foreach ($filter_request as $key => $filter){
//         $operator = (array_key_exists('operator', $filter) ? $filter['operator'] : null);
//         $value = (array_key_exists('value', $filter) ? $filter['value'] : null);
        
//         if ((strlen(trim($operator)) > 0) && (strlen(trim($value)) > 0)) {
//             switch ($key) {
//                 default:
//                     $key = 'tasks.' . $key;
//             }
//         }

//         $whereFilter[] = [$key, $operator, $value];
//     }
    
//     $data = Tasks::select(['tasks.*', 'task.nome as task_nome'])
//         ->leftJoin('task', 'cargos.id', '=', 'pessoas.cargo')
//         ->where($whereFilter)
//         ->limit(100 );

//     $dataTable = DataTables::of($data) 
//                 ->addColumn('action', 'tasks.action')
//                 ->make(true);

//     return $dataTable;
    
// }
