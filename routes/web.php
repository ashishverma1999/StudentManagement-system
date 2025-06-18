<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['auth', 'permission:student.view']], function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/list', [StudentController::class, 'list'])->name('students.list');
});

Route::group(['middleware' => ['auth', 'permission:student.create']], function () {
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
});

Route::group(['middleware' => ['auth', 'permission:student.edit']], function () {
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
});

Route::group(['middleware' => ['auth', 'permission:student.delete']], function () {
    Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::post('students/status/{id}', [StudentController::class, 'toggleStatus'])->name('students.status');



require __DIR__.'/auth.php';
