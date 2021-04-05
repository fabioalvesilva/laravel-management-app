@extends('layouts.template')
@section('title', 'Detalhes do Produto')
@section('content')

<!--Formatação do valor numérico da variável-->
<?php
$valor_prod=number_format($produto->preco,2,',','.');
?>
<div class="bg-light mt-4 ps-4">
    <!--Aqui tem duas formas sintaxe para utilizar o php. Com chavetas e sem chavetas1-->
    <h1 class="display-4"><?=$produto->nome;?></h1>
    <p class="lead">{{$produto->descricao}}</p>
    <p class="text-sucess">{{$valor_prod}}</p>

    <p class="pb-4"><a href="{{route('produtos')}}" role="button" class="btn btn-primary btn-lg">Ver Produtos</a></p>
</div>
@endsection