<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pack>
 */
class PackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));


        return [
            'nombre' => fake()->unique()->sentence(),
            'descripcion' => fake()->text(),
            'precio' => fake()->randomFloat(2, 499, 999),
            'imagen' => 'packs/' . fake()->picsum('public/storage/packs', 640, 480, false),
            'disponible' => fake()->randomElement(['SI', 'NO']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
