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
        Schema::create('mnt_bitacora', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_cliente_key");//llave foranea
            $table->string('direccion_ip', 45);
            $table->string('numero_documento_usuario');
            $table->string('respuesta');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_bitacora');
    }
};
