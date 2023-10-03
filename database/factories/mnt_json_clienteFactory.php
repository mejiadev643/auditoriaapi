<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class mnt_json_clienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {

        $faker = Factory::create();

        $json = $faker->json([
            'name' => $faker->name(),
            'age' => $faker->numberBetween(1, 100),
        ]);

        return [
            'json' => $json,
            'id_cliente' => $faker->numberBetween(1, 10),
        ];
    }
}
