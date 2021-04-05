@extends('layouts.template')
@section('title', 'Editar Produto')
@section('content')
    <div class="container mt-4">
        <form method="POST" action="{{route('produtos.editar',$produto)}}">
            @csrf
            @method('put')
            <div class="row">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required id="nome" class="form-control" value="{{$produto->nome}}">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" required id="preco" step="0.01" class="form-control" value="{{$produto->preco}}">
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" required id="quandidade" class="form-control" value="{{$produto->quantidade}}">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" name="descricao" required id="descricao" class="form-control">{{$produto->descricao}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-4">Alterar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

