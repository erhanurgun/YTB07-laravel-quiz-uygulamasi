<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('panel', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('quiz/detail/{slug}', [MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}', [MainController::class, 'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result', [MainController::class, 'result'])->name('quiz.result');
});

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quizzes/{id}/details', [QuizController::class, 'show'])->whereNumber('id')->name('quizzes.details');
    Route::get('quiz/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizzes', QuizController::class)->except(['destroy', 'show']);
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class)->except(['destroy']);
});
