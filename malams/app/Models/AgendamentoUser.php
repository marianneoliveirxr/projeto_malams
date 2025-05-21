<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agendamento extends Model
{
    protected $table = 'agendamentos';
    protected $primaryKey = 'idAgendamento';
    public $timestamps = true;

    protected $fillable = ['idServico', 'idFuncionario', 'idUser','dataAgendamento', 'hora', 'statusAgendamento', 'confirmacao'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }

    public function funcionarios(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario', 'idFuncionario');
    }

    public function servicos(): BelongsTo
    {
        return $this->belongsTo(Servico::class, 'idServico', 'idServico');
    }
}