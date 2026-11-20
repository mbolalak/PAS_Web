<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => fake()->unique()->randomElement(['11 pplg 1', '11 pplg 2', '11 pplg 3', '10 pplg 1', '10 pplg 2', '11 dkv 1', '11 dkv 2', '11 animasi 1', '11 animasi 2', '11 animasi 3']),
            'major' => fake()->randomElement(['PPLG', 'DKV', 'ANIMASI']),
        ];
    }
}
