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
    Schema::create('agendamentos', function (Blueprint $table) {
        $table->id();
        // Relacionamento com a tabela de carros
        $table->foreignId('carro_id')->constrained('carros')->onDelete('cascade');
        
        $table->string('nome_cliente');
        $table->date('data_retirada');
        $table->date('data_prevista_devolucao');
        $table->enum('status', ['Ativo', 'Finalizado'])->default('Ativo');
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
