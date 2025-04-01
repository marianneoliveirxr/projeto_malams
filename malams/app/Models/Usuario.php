<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nome da tabela

    public $fillable = ['idCliente', 'nomeCliente', 'cpfCliente', 'idadeCliente', 'celularCliente', 'emailCliente', 'cepCliente','numeroResidenciaCliente', 'senhaCliente'];

    public $timestamps = true;
}
