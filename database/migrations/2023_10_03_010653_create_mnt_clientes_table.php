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
        Schema::create('mnt_cliente', function (Blueprint $table) {
            $table->id();
            $table->text("nombre");
            $table->text("descripcion");
            $table->boolean("activo");
            $table->unsignedBigInteger("id_institucion");//llave foranea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_cliente');
    }
};
