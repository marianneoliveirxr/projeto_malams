<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissoes extends Model
{
    protected $table = 'permissoes';

    protected $primaryKey = 'idPermissao';

    protected $fillable = ['permissao'];
}
