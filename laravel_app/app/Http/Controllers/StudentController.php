<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::select([
            'id',
            'student_id',
            'full_name',
            'course',
            'year_level',
            'email',
            'created_at',
        ])->latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Student::create($this->validatedData($request));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record added successfully.');
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $student->update($this->validatedData($request, $student->id));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record deleted successfully.');
    }

    private function validatedData(Request $request, ?int $studentId = null): array
    {
        return $request->validate([
            'student_id' => ['required', 'string', 'max:50', 'unique:students,student_id,' . $studentId],
            'full_name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'year_level' => ['required', 'integer', 'min:1', 'max:10'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email,' . $studentId],
        ]);
    }
}
