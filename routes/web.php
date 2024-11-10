<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ai/test', [\App\Http\Controllers\GeminiApiController::class, 'index'])->name('ai.test');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group([], function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/profile/detail', [ProfileController::class, 'updateDetail'])->name('profile.update.detail');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::resource('learning-materials', \App\Http\Controllers\LearningMaterials::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('answers', \App\Http\Controllers\AnswerController::class);
    Route::resource('datasets', \App\Http\Controllers\DatasetController::class)->only(['index', 'destroy']);
    Route::resource('questions', \App\Http\Controllers\QuestionController::class);
    Route::resource('assessments', \App\Http\Controllers\AssessmentController::class);
    Route::resource('learning-styles', \App\Http\Controllers\LearningStyleController::class);
    Route::resource('assessment-answers', \App\Http\Controllers\AssessmentAnswerController::class);
    Route::resource('user-learning-styles', \App\Http\Controllers\UserLearningStyleController::class);
    Route::resource('educational-contents', \App\Http\Controllers\EducationalContentController::class);
});


require __DIR__ . '/auth.php';
