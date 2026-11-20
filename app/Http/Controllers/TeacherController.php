<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;


class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::with('subject')->latest()->get();
        $subjects = Subject::all();

        return view('admin.teacher.index', compact('teachers', 'subjects'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => 'required|string|max:50',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id',
            'start_date' => 'required|date',
        ], [
            'name.required' => 'Nama guru wajib diisi!',
            'niy.required' => 'NIY wajib diisi!',
            'subject_id.required' => 'Mata pelajaran wajib dipilih!',
            'subject_id.unique' => 'Mata pelajaran ini sudah diampu oleh guru lain!',
            'start_date.required' => 'Tanggal mulai mengajar wajib diisi!',
        ]);

        Teacher::create($validated);

        return redirect()->route('teacher.index')->with('success', 'Data guru berhasil ditambahkan!');
    }
}
