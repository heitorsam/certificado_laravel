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
    return 'Olá seja bem-vindo ao curso';
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.index');
Route::get('/contato', 'ContatoController@contato')->name('site.sobrenos');
Route::get('/login', function(){ return 'Login'; })->name('site.contato');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos'; })->name('app.produtos');    
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para a página inicial';    
});

//Route::redirect('/rota2','/rota1');

/*
Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');
*/

/*
Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
    string $nome = 'Desconhecido', 
    int $categoria_id = 1    
    ) {
        echo 'Estamos aqui ' . $nome . ' - ' . $categoria_id;
    }
)->where('categoria_id','[0-9]+')
 ->where('nome', '[A-Za-z]+');
 */