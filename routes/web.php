<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| ROUTES  — the front door of a Laravel app
|--------------------------------------------------------------------------
| Every request (URL + HTTP verb) is matched against this list.
| The first route that matches decides who handles it:
|   - a closure (small function written right here), or
|   - a controller method   [SomeController::class, 'method']
|
| See every route:   php artisan route:list
*/

// Lesson 1: the home page. A closure that returns a view (resources/views/home.blade.php).
Route::get('/', function () {
    return view('home');
});

Route::get('/hello/{your_name}', fn (string $your_name) => view('hello', compact('your_name')));
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::resource('students', StudentController::class);

Route::get('/roll/{your_roll}', fn (Student $your_roll) => view('students.show', ['student' => $your_roll]));

Route::get('/api/students', fn () => response()->json(Student::all()));
