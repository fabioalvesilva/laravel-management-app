<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilizador;
use App\Models\Produto;

class UtilizadorController extends Controller
{

    /*De forma a criar este controller foi executado o comando artisan: php artisan make:controller UtilizadorController.*/

    public function login(Request $request){

        $email=$request->email;
        $password=$request->password;
        //O first() faz com que a query termine a execução na Base de Dados mal encontre o primeiro resultado. Evita processamento dos registos todos existentes na BD.
        $utilizador=Utilizador::where('email','=',$email)->where('password','=',$password)->first(); 

        //O '@' em LARAVEL faz com que a variavel se torne global podendo ser usada noutras páginas.
        if(@$utilizador->cod_utilizador!=null){

            //Criação da sessão e os respectivos campos
            @session_start();
            $_SESSION["cod_util"]=$utilizador->cod_utilizador;
            $_SESSION["nome"]=$utilizador->nome;

            $produtos=Produto::orderby('id', 'desc')->paginate();
            return view('produtos.index', ['produtos'=>$produtos]);

        }else {
            echo "<script>
            window.alert('Dados incorretos ".$email.$password."');
            </script>";
            return view ('welcome');
        }
    }

    public function logout (){

        @session_start();
        @session_destroy();
        return view('welcome');
    }

    public function registo(){
        //Exibir a view do formulário
        return view('utilizadores.create');
    }

    public function registar(Request $request){

        $utilizador = new Utilizador();

        $utilizador->nome = $request->nome;
        $utilizador->email = $request->email;
        $utilizador->password = $request ->password;
        $utilizador->nome_util = $request->nome_util;
        $utilizador->telefone = $request->telefone;
        $utilizador->morada = $request->morada;
        $utilizador->data_registo = date('Y-m-d');

        $utilizador->save();

        return view('welcome');
    }

}
