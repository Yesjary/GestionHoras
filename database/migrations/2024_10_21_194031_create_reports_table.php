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
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // ID único
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario (estudiante)
            $table->string('status')->default('pending'); // Estado del reporte (pending, approved, rejected)
            $table->text('report_content'); // Contenido del reporte
            $table->timestamp('submitted_at')->nullable(); // Fecha de envío del reporte
            $table->timestamp('reviewed_at')->nullable(); // Fecha de revisión por parte del jefe de servicio
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
