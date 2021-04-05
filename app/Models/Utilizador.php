<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizador extends Model
{   
    public $timestamps=false; //Não guarda o timestamp do registo. N porque não temos os campos disponíveis (UPDATED_AT & CREATED_AT) na tabela da BD. 
    use HasFactory;
}
