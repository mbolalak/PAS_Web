<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;


class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'nis'  => fake()->randomNumber(5, true),
            'classroom_id' => Classroom::factory(),
            'address' => fake()->address(),
        ];
    }
}
