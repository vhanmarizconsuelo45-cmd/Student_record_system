@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                        <div>
                            <h1 class="h3 mb-1">Add Student</h1>
                            <p class="text-muted mb-0">Enter the required student information below.</p>
                        </div>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-primary">View List</a>
                    </div>

                    <form action="{{ route('students.store') }}" method="POST">
                        @include('students._form', ['buttonText' => 'Save Student'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
