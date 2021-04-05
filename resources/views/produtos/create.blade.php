@extends('layouts.template')
@section('title', 'Criar Produtos')
@section('content')
    <div class="container mt-4">
        <form method="POST" action="{{route('produtos.insert')}}">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required id="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" required id="preco" step="0.01" class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" required id="quandidade" class="form-control">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" name="descricao" required id="descricao" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

