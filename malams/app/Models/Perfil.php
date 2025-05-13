<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nome da tabela

    public $fillable = ['id', 'nomeCliente', 'cpfCliente', 'dataNascimento', 'celularCliente', 'emailCliente'];

    public $timestamps = false;
}
