<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('permissoes', function (Blueprint $table) {
        $table->id('idPermissao');
        $table->enum('permissao', ['cliente', 'funcionario', 'administrador']);
        $table->timestamps(); 
    });
}

public function down()
{
    Schema::dropIfExists('permissoes');
}
};
