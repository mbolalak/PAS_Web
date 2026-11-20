<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;


class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::with('students')->latest()->get();

        return view('admin.classroom.index', compact('classrooms'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ], [
            'name.required'  => 'Nama kelas wajib diisi!',
            'major.required' => 'Jurusan wajib diisi!',
        ]);

        Classroom::create($validated);

        return redirect()->route('classroom.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }
}
