<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::redirect('/', '/students');
Route::resource('students', StudentController::class);
