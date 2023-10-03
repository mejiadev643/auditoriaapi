<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\ctl_institucion::factory(10)->create();
        \App\Models\mnt_cliente::factory(10)->create();
        \App\Models\mnt_sistema::factory(10)->create();
        \App\Models\mnt_json_cliente::factory(10)->create();
        \App\Models\mnt_json_cliente_permiso::factory(10)->create();
        \App\Models\mnt_cliente_key::factory(10)->create();
        \App\Models\ctl_tipo_bitacora::factory(10)->create();
        \App\Models\mnt_bitacora::factory(10)->create();

    }
}
