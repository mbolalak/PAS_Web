<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;


class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::with('teacher')->latest()->get();
        return view('admin.subject.index', compact('subjects'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi!',
        ]);

        Subject::create($validated);

        return redirect()->route('subject.index')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }
}
