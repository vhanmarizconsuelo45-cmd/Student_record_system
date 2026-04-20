@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label for="student_id" class="form-label">Student ID</label>
        <input
            type="text"
            class="form-control @error('student_id') is-invalid @enderror"
            id="student_id"
            name="student_id"
            value="{{ old('student_id', $student->student_id ?? '') }}"
            required
        >
        @error('student_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="full_name" class="form-label">Full Name</label>
        <input
            type="text"
            class="form-control @error('full_name') is-invalid @enderror"
            id="full_name"
            name="full_name"
            value="{{ old('full_name', $student->full_name ?? '') }}"
            required
        >
        @error('full_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="course" class="form-label">Course</label>
        <input
            type="text"
            class="form-control @error('course') is-invalid @enderror"
            id="course"
            name="course"
            value="{{ old('course', $student->course ?? '') }}"
            required
        >
        @error('course')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="year_level" class="form-label">Year Level</label>
        <select
            class="form-select @error('year_level') is-invalid @enderror"
            id="year_level"
            name="year_level"
            required
        >
            <option value="">Select year level</option>
            @foreach ([1, 2, 3, 4, 5] as $level)
                <option value="{{ $level }}" @selected((string) old('year_level', $student->year_level ?? '') === (string) $level)>{{ $level }}{{ match ($level) { 1 => 'st', 2 => 'nd', 3 => 'rd', default => 'th' } }} Year</option>
            @endforeach
        </select>
        @error('year_level')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="email" class="form-label">Email Address</label>
        <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            name="email"
            value="{{ old('email', $student->email ?? '') }}"
            required
        >
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Back</a>
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>
