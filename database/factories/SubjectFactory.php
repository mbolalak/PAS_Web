<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Pemrograman Web',
                'Basis Data',
                'Pemrograman Berorientasi Objek',
                'Pemodelan Perangkat Lunak',
                'Desain Komunikasi Visual',
                'Animasi 2D & 3D',
                'Jaringan Komputer',
                'Kecerdasan Buatan',
                'Sistem Operasi',
                'Cloud Computing',
            ]),
        ];
    }
}
