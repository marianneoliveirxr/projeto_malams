<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';
    protected $primaryKey = 'idAgendamento';
    public $timestamps = false;

    protected $fillable = [
        'idServico', 'idFuncionario', 'idUser',
        'dataAgendamento', 'hora', 'statusAgendamento', 'confirmacao'
    ];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'idServico', 'idServico');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario', 'idFuncionario');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }
}