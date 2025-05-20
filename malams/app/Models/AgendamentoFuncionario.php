<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgendamentoFuncionario extends Model
{protected $table = 'agendamentos';
    protected $primaryKey = 'idAgendamento';
    public $timestamps = false;

    protected $fillable = [
        'idServico',
        'idFuncionario',
        'idUser',
        'dataAgendamento',
        'hora',
        'statusAgendamento',
        'confirmacao',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario', 'idFuncionario');
    }

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, 'idServico', 'idServico');
    }
}