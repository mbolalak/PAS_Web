<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Classroom::factory(10)
            ->hasStudents(5)
            ->create();


        Subject::factory(10)
            ->has(Teacher::factory())
            ->create();
    }
}
//basis data->pak dwi\
//KIK -> bu hermin
