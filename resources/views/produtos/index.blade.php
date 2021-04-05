@extends('layouts.template')
@section('title', 'Lista de produtos')
@section('content')

<?php

@session_start();
if(@$_SESSION['cod_util']==null){
    echo "<script>window.location='./'</script>"; //Se não tivermos a sessão iniciada irá mostrar o form do login apenas
}
if(!isset($id)){
    //Inicializar o id para que quando entro na página e não clico em delete não aconteça o erro da variável indefinida
    $id="";
}
?>
<a href="{{route('produtos.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Produtos</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->quantidade}}</td>
                    <td>
                        <a href="{{route('produtos.descricao',$produto->id)}}"><i class="fas fa-eye text-primary me-3"></i></a>
                        <a href="{{route('produtos.edit',$produto)}}"><i class="fas fa-edit text-info me-2"></i></a>
                        <a href="{{route('produtos.modal',$produto)}}"><i class="fas fa-trash me-2 text-danger"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--Paginação-->
        <!--{{$produtos->links()}}-->
    </div>
</div>
<!--Script para data table-->
<script>
   
    $(document).ready(function (){
        $('#dataTable').DataTable();
    })
</script>
</div>
@endsection

@section('modal')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remover produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja excluir este produto {{$id}}? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{route('produtos.delete', $id)}}">
                    <!--Evita submissão origem não fidedigna-->
                    @csrf
                    <!--Fazer a submissão com o método delete-->
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if($id!=''){
    echo"<script>
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    </script>";
}
?>
@endsection
