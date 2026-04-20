<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Student Management System' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(180deg, #eef6ff 0%, #f8fbff 55%, #ffffff 100%);
        }

        .hero-card {
            background: linear-gradient(135deg, #0b5ed7, #5aa9ff);
            color: #fff;
            border: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('students.index') }}">Student Management System</a>
            <div class="d-flex gap-2">
                <a href="{{ route('students.index') }}" class="btn btn-outline-light btn-sm">View List</a>
                <a href="{{ route('students.create') }}" class="btn btn-light btn-sm">Add Student</a>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
