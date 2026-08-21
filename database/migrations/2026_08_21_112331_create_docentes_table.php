<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {      
        // Tabela para os dados dos Docentes
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cidade');
            $table->enum('titulo', ['Doutorado','Mestrado']);
            $table->enum('area',['Contabilidade','Administração','Economia']);
            $table->integer('ano_contratacao');
            $table->enum('status',['Ativo','Inativo'])->default('Ativo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
