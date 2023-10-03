<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class mnt_bitacoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_cliente_key' => fake()->numberBetween(1, 10),
            'ip_sistema' => fake()->ipv4(),
            'numero_documento_usuario' => fake()->numberBetween(1, 10),
            'respuesta' => fake()->text(),
            'id_tipo_bitacora'=>fake()->numberBetween(1, 10),
            'fecha'=>fake()->date(),
        ];
    }
}
