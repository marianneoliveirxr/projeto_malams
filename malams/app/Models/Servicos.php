<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $table = 'servicos';
    protected $primaryKey = 'idServico';
    public $timestamps = false;

    protected $fillable = [
        'idCategoria',
        'servico',
        'preco',
    ];

    // Relação com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
