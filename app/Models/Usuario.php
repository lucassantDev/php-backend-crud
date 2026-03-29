<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'primeira_nota',
        'segunda_nota',
        'terceira_nota',
        'quarta_nota'
    ];
}

