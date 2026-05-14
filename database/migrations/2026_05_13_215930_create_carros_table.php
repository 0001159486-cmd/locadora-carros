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
    Schema::create('carros', function (Blueprint $table) {
        $table->id();
        $table->string('modelo');
        $table->string('marca');
        $table->string('placa')->unique();
        $table->integer('ano');
        // Status padrão como 'Disponível' conforme RF02
        $table->enum('status', ['Disponível', 'Agendado'])->default('Disponível');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
