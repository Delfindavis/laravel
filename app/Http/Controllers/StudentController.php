<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('students.index', ['students' => Student::orderBy('roll_no')->get()]);
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'roll_no' => ['required', 'string', 'max:255', 'unique:students,roll_no'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'department' => ['nullable', 'string', 'max:255'],
            'semester' => ['nullable', 'integer', 'between:1,12'],
            'cgpa' => ['nullable', 'numeric', 'between:0,10'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('status', 'Student saved successfully.');
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }
}