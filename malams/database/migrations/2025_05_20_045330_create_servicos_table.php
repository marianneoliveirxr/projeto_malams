<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id('idServico'); 
            $table->unsignedBigInteger('idCategoria'); 
            $table->string('servico', 100); 
            $table->decimal('preco', 5, 2); 

            $table->primary('idServico');

            // Chave estrangeira para a tabela categorias
            $table->foreign('idCategoria')
                  ->references('idCategoria')
                  ->on('categorias')
                  ->onDelete('cascade'); // Deleta serviços se a categoria for removida
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
