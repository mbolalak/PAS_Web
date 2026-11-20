<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;


class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('classroom')->latest()->get();
        $classrooms = Classroom::all();

        return view('admin.student.index', [
            'students' => $students,
            'classrooms' => $classrooms
        ]);
    }


    public function create()
    {
        return redirect()->route('student.index');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:50|unique:students,nis',
            'nama' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'required|string|max:500',
        ], [
            // Pesan Error Kustom (Bahasa Indonesia yang mudah dipahami guru)
            'nis.required' => 'NIS wajib diisi!',
            'nis.unique' => 'NIS sudah dipakai, gunakan NIS lain!',
            'nama.required' => 'Nama siswa wajib diisi!',
            'classroom_id.required' => 'Kelas wajib dipilih!',
            'classroom_id.exists' => 'Kelas yang dipilih tidak valid!',
            'address.required' => 'Alamat wajib diisi!',
        ]);

        Student::create($validated);

        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }
}
