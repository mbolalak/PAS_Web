<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * FACTORY: TeacherFactory
 * 
 * FUNGSI FACTORY:
 * Blueprint untuk men-generate data guru acak secara otomatis.
 * 
 * ALUR:
 * 1. fake()->name() : nama guru acak.
 * 2. fake()->numerify('##########') : 10 digit nomor NIY acak.
 * 3. 'subject_id' => Subject::factory() : membuat atau menghubungkan dengan mata pelajaran.
 * 4. fake()->date() : tanggal mulai mengajar acak.
 */
class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'niy' => fake()->numerify('##########'),
            'subject_id' => Subject::factory(),
            'start_date' => fake()->date(),
        ];
    }
}
