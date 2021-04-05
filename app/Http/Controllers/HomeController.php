<?php
 
/*De forma a criarmos um controlador temos de executar o comando: php artisan make:controller NOME DA CLASSE dentro da pasta do projeto.*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Invoke é o método construtor de uma classe
    public function __invoke(){
        return view('welcome');
    }
}


