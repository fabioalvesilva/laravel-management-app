<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /*De forma a criar este controller foi executado o comando artisan 'php artisan make:controller ProdutoController'.*/


    public function index()
    {

        //Query SQL no LARAVEL para listar os produtos
        $produtos = Produto::orderby('id', 'desc')->paginate();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create()
    {
        //Exibe a view. O controller é responsável por mostrar as views.
        return view('produtos.create');
    }

    public function insert(Request $request)
    {

        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;

        $produto->save();

        return redirect('produtos');
    }

    //exibir formulário para a edição de um produto especifico
    public function edit(produto $produto)
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    //criar o método para atualizar o produto
    public function editar(Request $request, produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;

        $produto->save();

        //Outro tipo de redirecionamento pelo nome da página com o mesmo efeito
        return redirect()->route('produtos');
    }

    //criar o método para exibir a vista com os detalhes do produto
    public function show($id)
    {
        $produto = Produto::find($id);

        //Outro tipo de redirecionamento pelo nome da página com o mesmo efeito
        return view('produtos.show', ['produto' => $produto]);
    }

    public function modal($id)
    {   
        //Paginate define o numero de registos a mostrar por página. 
        $produtos=Produto::orderby('id', 'desc')->paginate();
        return view ('produtos.index', ['produtos'=>$produtos, 'id'=>$id]);
    }

    public function delete(produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos');
    }
}
