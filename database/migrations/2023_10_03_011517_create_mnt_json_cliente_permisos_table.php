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
        Schema::create('mnt_json_cliente_permisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_json");
            $table->integer("cantidad_peticiones");
            $table->json("json_campos_permitidos");//pendientes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_json_cliente_permisos');
    }
};
