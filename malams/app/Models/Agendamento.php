<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';
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

    // Relacionamento com o serviço
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'idServico', 'idServico');
    }

    // Relacionamento com o funcionário
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario', 'idFuncionario');
    }

    // Relacionamento com o usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
