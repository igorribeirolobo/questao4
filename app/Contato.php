<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    /**
     * Segurança para receber apenas os campos abaixo
     * @var array
     */
    protected $fillable = [
        'nome','telefone','email','endereco','updated_at','created_at'
    ];
}
