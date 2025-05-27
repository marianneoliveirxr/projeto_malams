<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Servico;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';
    protected $primaryKey = 'idFuncionario';
    public $timestamps = false; 

    protected $fillable = [
        'idPermissao',
        'idCategoria',
        'idServico',
        'nomeFuncionario',
        'emailFuncionario',
        'celularFuncionario',
        'cpfFuncionario',
        'senhaFuncionario',
    ];

    // Relacionamentos 
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'idServico', 'idServico');
    }
}
