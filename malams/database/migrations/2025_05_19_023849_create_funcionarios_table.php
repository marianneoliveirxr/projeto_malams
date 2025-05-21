<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nomeFuncionario');
            $table->string('emailFuncionario');
            $table->string('celularFuncionario');
            $table->string('cpfFuncionario');
            $table->varbinary('senha');
            $table->foreingId('idCategoria')->constrained('categorias');
            $table->foreingId('idServico')->constrained('servicos');
            $table->foreingId('idPermissao')->constrained('permissoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
