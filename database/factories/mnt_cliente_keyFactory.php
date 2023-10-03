<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class mnt_cliente_keyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_key'=>fake()->text(),
            'secret_key'=>fake()->text(),
            'activo'=>fake()->boolean(),
            'id_pemiso'=>fake()->numberBetween(1, 10),
            'id_sistema'=>fake()->numberBetween(1, 10),
            'id_cliente'=>fake()->numberBetween(1, 10),
        ];
    }
}
