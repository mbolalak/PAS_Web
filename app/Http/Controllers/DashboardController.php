<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;


class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $classroomCount = Classroom::count();
        $teacherCount = Teacher::count();
        $subjectCount = Subject::count();

        return view('admin.dashboard', compact(
            'studentCount',
            'classroomCount',
            'teacherCount',
            'subjectCount'
        ));
    }
}
