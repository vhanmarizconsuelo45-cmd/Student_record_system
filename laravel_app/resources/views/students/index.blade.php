@extends('layouts.app')

@section('content')
    <div class="card hero-card shadow-sm mb-4">
        <div class="card-body p-4 p-lg-5">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <div>
                    <h1 class="h3 mb-2">Student Records</h1>
                    <p class="mb-0">Manage student profiles, contact details, and academic information in one place.</p>
                </div>
                <a href="{{ route('students.create') }}" class="btn btn-light btn-lg">Add New Student</a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">All Students</h2>
                <span class="badge text-bg-primary">{{ $students->total() }} record(s)</span>
            </div>

            @if ($students->isEmpty())
                <div class="alert alert-info mb-0">No student records found yet. Add your first student to get started.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Email Address</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->student_id }}</td>
                                    <td>{{ $student->full_name }}</td>
                                    <td>{{ $student->course }}</td>
                                    <td>{{ $student->year_level_label }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $students->links() }}
            @endif
        </div>
    </div>
@endsection
