<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class mnt_json_cliente_permisosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_json'=>fake()->numberBetween(1, 10),
            'cantidad_peticiones'=>fake()->numberBetween(1, 10),
            'json_campos_permitidos'=>fake()->json(),
        ];
    }
}
