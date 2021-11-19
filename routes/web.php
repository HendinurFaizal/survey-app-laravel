<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
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
});

/** Authentication */
Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('view.register');
Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('view.login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

/** Dashboard */
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

/** Survey */
Route::get('/survey', [SurveyController::class, 'showCreateSurvey'])->name('view.create.survey');
Route::get('/survey-response', [SurveyController::class, 'showResponseSurvey'])->name('view.response.survey');
Route::post('/survey', [SurveyController::class, 'createSurvey'])->name('create.survey');

/** Vote */
Route::get('/vote', [VoteController::class, 'showCreateVote'])->name('view.create.vote');
Route::get('/vote-response', [VoteController::class, 'showResponseVote'])->name('view.response.vote');
Route::post('/vote', [VoteController::class, 'createVote'])->name('create.vote');
