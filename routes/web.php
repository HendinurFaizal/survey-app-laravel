<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyQuestionController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

/** Authentication */
Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('view.register');
Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('view.login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

/** Dashboard */
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

/** Survey */
Route::get('/survey', [SurveyController::class, 'showCreateSurvey'])->name('view.create.survey');
Route::get('/survey/{survei}', [SurveyController::class, 'showSurvey'])->name('view.survey');
Route::get('/survey-response/{survei}', [SurveyController::class, 'showResponseSurvey'])->name('view.response.survey');
Route::get('/survey/success', [SurveyController::class, 'showSuccessSurvey'])->name('view.success.survey');
Route::post('/survey', [SurveyController::class, 'createSurvey'])->name('create.survey');
Route::post('/survey-response/{survei}', [SurveyController::class, 'responseSurvey'])->name('response.survey');

/** Questions */
Route::get('/survey/{id}/questions', [SurveyQuestionController::class, 'showCreateQuestion']);
Route::post('/survey/{id}/questions', [SurveyQuestionController::class, 'createQuestion']);

/** Vote */
Route::get('/vote', [VoteController::class, 'showCreateVote'])->name('view.create.vote');
Route::get('/vote-response/{id}', [VoteController::class, 'showResponseVote'])->name('view.response.vote');
Route::get('/vote/success', [VoteController::class, 'showSuccessVote'])->name('view.success.vote');
Route::post('/vote', [VoteController::class, 'createVote'])->name('create.vote');
Route::post('/vote-response/{id}', [VoteController::class, 'responseVote'])->name('response.vote');
