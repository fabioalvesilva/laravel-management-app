@extends('layouts.template')
@section('title', 'Registo Utilizador')
@section('content')
    <div class="container mt-4">
        <form method="POST" action="{{route('utilizador.registar')}}">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required id="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Password:</label>
                    <input type="password" name="password" required id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome_util">Nome Utilizador:</label>
                    <input type="text" name="nome_util" required id="nome_util" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" name="telefone" required id="telefone" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label for="morada">Morada:</label>
                    <input type="text" name="morada" required id="morada" class="form-control"></input>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-4">Registar</button>
                </div>
            </div>
        </form>
    </div>
@endsection