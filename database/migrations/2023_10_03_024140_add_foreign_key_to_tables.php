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
        Schema::table('mnt_bitacora', function (Blueprint $table) {
            $table->foreignId('id_cliente_key')->after('id')->constrained('mnt_cliente_key');
            $table->foreignId('id_tipo_bitacora')->after('respuesta')->constrained('ctl_tipo_bitacora');
        });

        Schema::table('mnt_cliente_key', function (Blueprint $table) {
            $table->foreignId('id_permiso')->after('activo')->constrained('mnt_json_cliente_permisos');
            $table->foreignId('id_sistema')->after('id_permiso')->constrained('mnt_sistema');
            $table->foreignId('id_cliente')->after('id_sistema')->constrained('mnt_cliente');
        });

        Schema::table('mnt_sistema', function (Blueprint $table) {
            $table->foreignId('id_institucion')->after('activo')->constrained('ctl_institucion');
        });

        Schema::table('mnt_json_cliente_permisos', function (Blueprint $table) {
            $table->foreignId('id_json')->after('id')->constrained('mnt_json_cliente');
        });

        Schema::table('mnt_json_cliente', function (Blueprint $table) {
            $table->foreignId('id_cliente')->after('json')->constrained('mnt_cliente');
        });

        Schema::table('mnt_cliente', function (Blueprint $table) {
            $table->foreignId('id_institucion')->after('activo')->constrained('ctl_institucion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mnt_bitacora', function (Blueprint $table) {
            $table->dropColumn('id_cliente_key');
            $table->dropColumn('id_tipo_bitacora');
        });

        Schema::table('mnt_cliente_key', function (Blueprint $table) {
            $table->dropColumn('id_permiso');
            $table->dropColumn('id_sistema');
            $table->dropColumn('id_cliente');
        });

        Schema::table('mnt_sistema', function (Blueprint $table) {
            $table->dropColumn('id_institucion');
        });

        Schema::table('mnt_json_cliente_permiso', function (Blueprint $table) {
            $table->dropColumn('id_json');
        });

        Schema::table('mnt_json_cliente', function (Blueprint $table) {
            $table->dropColumn('id_cliente');
        });

        Schema::table('mnt_cliente', function (Blueprint $table) {
            $table->dropColumn('id_institucion');
        });
    }
};
