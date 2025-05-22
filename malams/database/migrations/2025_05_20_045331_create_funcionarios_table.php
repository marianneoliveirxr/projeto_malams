<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('idFuncionario'); // ID auto-increment
            $table->unsignedBigInteger('idPermissao'); // FK para permissoes
            $table->unsignedBigInteger('idCategoria');   // FK para categoria
            $table->unsignedBigInteger('idServico');   // FK para servicos
            $table->string('nomeFuncionario', 50);     // Nome
            $table->string('emailFuncionario', 50);    // Email
            $table->string('celularFuncionario', 20)->nullable(); // Celular (opcional)
            $table->string('cpfFuncionario', 20);      // CPF
            $table->string('senhaFuncionario', 255);   // Senha como string

            $table->primary('idFuncionario');

            // Foreign Key para permissoes
            $table->foreign('idPermissao')
                  ->references('idPermissao')
                  ->on('permissoes')
                  ->onDelete('cascade');

            // Foreign Key para servicos
            $table->foreign('idServico')
                  ->references('idServico')
                  ->on('servicos')
                  ->onDelete('cascade');

            // Foreign Key para categoria
            $table->foreign('idCategoria')
                  ->references('idCategoria')
                  ->on('categorias')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
