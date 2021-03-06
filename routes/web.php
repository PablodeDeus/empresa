<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('layout');
});
*/

    
Route::get('/', function () {
    return view('home');
});

//---------------------------------Ajax----------------------------------------

Route::prefix('/ajax')->group(function(){
    Route::get('/pessoas', 'AjaxController@listPessoas')->name('ajax.listPessoa');
    Route::get('/pessoas/show', 'AjaxController@listTarefasPessoa')->name('ajax.listTarefaPessoa');
    Route::get('/tasks', 'AjaxController@listTasks')->name('ajax.listTask');
    Route::get('/cargos', 'AjaxController@listCargos')->name('ajax.listCargo');;

});
    
//---------------------------------Pessoas----------------------------------------
    
Route::resource('pessoas','PessoasController');


//---------------------------------Tasks----------------------------------------

Route::resource('task','TaskController');


//---------------------------------Cargos----------------------------------------

Route::resource('cargos','CargosController');



