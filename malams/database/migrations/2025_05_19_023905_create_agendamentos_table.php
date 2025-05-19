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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->date('dataAgendamento');
            $table->time('hora');
            $table->string('statusAgendamento');
            $table->enum('sim', 'nao');
            $table->foreingId('idServico')->constrained('servicos');
            $table->foreingId('idFuncionario')->constrained('funcionarios');
            $table->foreingId('IdUser')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
