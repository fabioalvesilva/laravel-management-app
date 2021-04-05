<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UtilizadorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',HomeController::class)->name('home');

/*Chama a função create dentro da classe ProdutoController. O NAME é a página que queremos aceder'*/
Route::get('produtos/inserir', [ProdutoController::class, 'create'])->name('produtos.inserir');
Route::post('produtos', [ProdutoController::class, 'insert'])->name('produtos.insert');

/*Rotas para a edição de produtos. Mostrar a página de edição de um produto */
Route::get('produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
/*Chamar método para chamar alterações na BD */
Route::put('produtos/{produto}', [ProdutoController::class, 'editar'])->name('produtos.editar');
/*Rota para mostrar os detalhes de um produto */
Route::get('produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.descricao');
/*Rota para exibir uma janela modal a solicitar a confirmação para remover o produto */
Route::get('produtos/{produto}/delete', [ProdutoController::class, 'modal'])->name('produtos.modal');
/*Rota para remover o produto */
Route::delete('produtos/{produto}', [ProdutoController::class, 'delete'])->name('produtos.delete');
/*Lista de produtos */
Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos');

/*Página de registo de utilizadores */
Route::get('utilizadores/create', [UtilizadorController::class, 'registo'])->name('utilizador.registo');
Route::post('utilizadores', [UtilizadorController::class, 'registar'])->name('utilizador.registar');

/*Rota para login */
Route::post('painel', [UtilizadorController::class, 'login'])->name('utilizador.login');
/*Rota para logout */
Route::get('logout', [UtilizadorController::class, 'logout'])->name('utilizador.logout');




