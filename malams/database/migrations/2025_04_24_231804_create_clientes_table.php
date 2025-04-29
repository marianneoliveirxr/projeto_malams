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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCliente');
            $table->string('cpfCliente')->unique();
            $table->string('celularCliente')->unique();
            $table->string('emailCliente')->unique();
            $table->date('dataNascimento');
            $table->varbinary('senhaCliente');
            $table->foreignId('idPermissoes')->constrained('permissoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
