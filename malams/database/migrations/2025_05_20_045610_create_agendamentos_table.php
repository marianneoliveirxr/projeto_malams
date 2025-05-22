<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id('idAgendamento');

            $table->unsignedBigInteger('idServico');
            $table->unsignedBigInteger('idFuncionario');
            $table->unsignedBigInteger('idUser');

            $table->date('dataAgendamento');
            $table->time('hora');
            $table->string('statusAgendamento', 20);
            $table->enum('confirmacao', ['sim', 'nao']);

            $table->foreign('idServico')->references('idServico')->on('servicos');
            $table->foreign('idFuncionario')->references('idFuncionario')->on('funcionarios');
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
