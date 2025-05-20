<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
     protected $table = 'funcionarios';

    protected $primaryKey = 'idFuncionario';

    protected $fillable = [
        'permissao'
    ];
}
