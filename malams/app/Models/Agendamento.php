<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';  // Especifica o nome da tabela

    // Define os campos que podem ser preenchidos
    protected $fillable = [
        'idServico',
        'idFuncionario',
        'idUser',
        'dataAgendamento',
        'hora',
        'statusAgendamento',
        'confirmacao',
    ];

    // Relacionamento com a tabela Servicos
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'idServico', 'idServico');
    }

    // Relacionamento com a tabela Funcionarios
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario', 'idFuncionario');
    }

    // Relacionamento com a tabela Users (usuário que está fazendo o agendamento)
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}

