<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupStudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\TeacherController;
use App\Models\GroupStudent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('schools', [SchoolController::class, 'index'])->name('schools');
Route::get('school/edit/{school}', [SchoolController::class, 'edit'])->name('school.edit');
Route::post('school/update/{school}', [SchoolController::class, 'update'])->name('school.update');
Route::post('school/destroy/{school}', [SchoolController::class, 'destroy'])->name('school.destroy');
Route::get('school/create', [SchoolController::class, 'create'])->name('school.create');
Route::post('school/store', [SchoolController::class, 'store'])->name('school.store');

Route::get('lessons', [LessonController::class, 'index'])->name('lessons');
Route::get('lesson/edit/{lesson}', [LessonController::class, 'edit'])->name('lesson.edit');
Route::post('lesson/update/{lesson}', [LessonController::class, 'update'])->name('lesson.update');
Route::post('lesson/destroy/{lesson}', [LessonController::class, 'destroy'])->name('lesson.destroy');
Route::get('lesson/create', [LessonController::class, 'create'])->name('lesson.create');
Route::post('lesson/store', [LessonController::class, 'store'])->name('lesson.store');

Route::get('streets', [StreetController::class, 'index'])->name('streets');
Route::get('street/edit/{street}', [StreetController::class, 'edit'])->name('street.edit');
Route::post('street/update/{street}', [StreetController::class, 'update'])->name('street.update');
Route::post('street/destroy/{street}', [StreetController::class, 'destroy'])->name('street.destroy');
Route::get('street/create', [StreetController::class, 'create'])->name('street.create');
Route::post('street/store', [StreetController::class, 'store'])->name('street.store');

Route::get('stages', [StageController::class, 'index'])->name('stages');
Route::get('stage/edit/{stage}', [stageController::class, 'edit'])->name('stage.edit');
Route::post('stage/update/{stage}', [stageController::class, 'update'])->name('stage.update');
Route::post('stage/destroy/{stage}', [stageController::class, 'destroy'])->name('stage.destroy');
Route::get('stage/create', [stageController::class, 'create'])->name('stage.create');
Route::post('stage/store', [stageController::class, 'store'])->name('stage.store');

Route::get('groups', [GroupController::class, 'index'])->name('groups');
Route::get('group/edit/{group}', [groupController::class, 'edit'])->name('group.edit');
Route::post('group/update/{group}', [groupController::class, 'update'])->name('group.update');
Route::post('group/destroy/{group}', [groupController::class, 'destroy'])->name('group.destroy');
Route::get('group/create', [groupController::class, 'create'])->name('group.create');
Route::post('group/store', [groupController::class, 'store'])->name('group.store');

Route::get('groupStudent/show/{group}', [GroupStudentController::class, 'show'])->name('groupStudent.show');
Route::get('groupStudent/edit/{groupStudent}', [GroupStudentController::class, 'edit'])->name('groupStudent.edit');
Route::post('groupStudent/update/{groupStudent}', [GroupStudentController::class, 'update'])->name('groupStudent.update');
Route::post('groupStudent/destroy/{groupStudent}', [GroupStudentController::class, 'destroy'])->name('groupStudent.destroy');
Route::get('groupStudent/create/{group_id}', [GroupStudentController::class, 'create'])->name('groupStudent.create');
Route::post('groupStudent/store', [GroupStudentController::class, 'store'])->name('groupStudent.store');

Route::get('students', [StudentsController::class, 'index'])->name('students');
Route::get('student/edit/{student}', [StudentsController::class, 'edit'])->name('student.edit');
Route::get('student/show/{student}', [StudentsController::class, 'show'])->name('student.show');
Route::post('student/update/{student}', [StudentsController::class, 'update'])->name('student.update');
Route::post('student/destroy/{student}', [StudentsController::class, 'destroy'])->name('student.destroy');
Route::get('student/create', [StudentsController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentsController::class, 'store'])->name('student.store');

Route::get('teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('teacher/edit/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::get('teacher/show/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
Route::post('teacher/update/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
Route::post('teacher/destroy/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
