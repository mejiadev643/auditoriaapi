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
        Schema::create('mnt_cliente_key', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_key");//llave foranea
            $table->text("secret_key");
            $table->boolean("activo");
            $table->unsignedBigInteger("id_permiso");//llave foranea
            $table->unsignedBigInteger("id_sistema");//llave foranea
            $table->unsignedBigInteger("id_cliente");//llave foranea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_cliente_key');
    }
};
