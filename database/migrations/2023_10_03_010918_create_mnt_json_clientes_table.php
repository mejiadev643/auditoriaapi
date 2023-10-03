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
        Schema::create('mnt_json_cliente', function (Blueprint $table) {
            $table->id();
            $table->json('json');//campo de tipo json para almacenar datos json
            //$table->unsignedBigInteger("id_cliente");//llave foranea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_json_cliente');
    }
};
