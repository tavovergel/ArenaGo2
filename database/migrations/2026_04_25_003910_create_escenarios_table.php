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
        Schema::create('escenarios', function (Blueprint $table) {
            $table->id('id_escenario');
            $table->string('nombre_escenario');
            $table->text('descripcion')->nullable();
            $table->string('direccion');
           $table->double('latitud');
            $table->double('longitud');
            $table->string('municipio'); // Ejemplo: Pereira, Dosquebradas...
            $table->string('deporte');
            $table->string('estado');
            $table->text('horarios');
            $table->string('iluminacion');
            $table->string('suelo');
            $table->integer('capacidad');
            $table->string('imagen')->nullable();
            $table->string('banos');
            
            // Relación con el usuario que registra
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps(); // Esto crea created_at (fecha_registro) y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escenarios');
    }
};
