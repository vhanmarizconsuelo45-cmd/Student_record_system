@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h1 class="h3 mb-1">{{ $student->full_name }}</h1>
                            <p class="text-muted mb-0">Student profile overview</p>
                        </div>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-primary">View List</a>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small">Student ID</div>
                                <div class="fw-semibold">{{ $student->student_id }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small">Course</div>
                                <div class="fw-semibold">{{ $student->course }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small">Year Level</div>
                                <div class="fw-semibold">{{ $student->year_level_label }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small">Email Address</div>
                                <div class="fw-semibold">{{ $student->email }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
