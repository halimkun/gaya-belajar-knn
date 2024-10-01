<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/detail', [ProfileController::class, 'updateDetail'])->name('profile.update.detail');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('test', \App\Http\Controllers\TestController::class);


Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('answers', \App\Http\Controllers\AnswerController::class);
Route::resource('assessment-answers', \App\Http\Controllers\AssessmentAnswerController::class);
Route::resource('assessments', \App\Http\Controllers\AssessmentController::class);
Route::resource('educational-contents', \App\Http\Controllers\EducationalContentController::class);
Route::resource('learning-styles', \App\Http\Controllers\LearningStyleController::class);
Route::resource('questions', \App\Http\Controllers\QuestionController::class);
Route::resource('user-learning-styles', \App\Http\Controllers\UserLearningStyleController::class);

require __DIR__.'/auth.php';
