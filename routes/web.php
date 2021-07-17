<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTraineeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HandleUserController;

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

Route::get('/report', function () {
    return view('pages.trainee.reportDaily');
})->name('report');
Route::get('/historyReport', function () {
    return view('pages.trainee.historyReport');
})->name('historyReport');
Route::get('/profile', function () {
    return view('pages.trainee.profile');
})->name('profile');
Route::get('/detailReport', function () {
    return view('pages.trainee.detailReport');
})->name('detailReport');
Route::get('/', function () {
    return view('welcome');
})->name('detailReport')->middleware(['auth']);
Route::resource('listCourse', CourseController::class);
Route::resource('listSubject', SubjectController::class);
Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Auth::routes();
Route::get('/search', [CourseController::class, 'search'])->name('search');
Route::delete('/kick-user/{id}/{courseId}', [CourseController::class, 'kickUser'])->name('kickUser');
Route::get('/homeTrainee/{id}', [CourseTraineeController::class, 'homeTrainee'])->name('homeTrainee');
Route::resource('user', UserController::class);
Route::get('/listCourse/detailSubject/{id}/{dateStart}', [SubjectController::class, 'showSub'])->name('showSbj');
