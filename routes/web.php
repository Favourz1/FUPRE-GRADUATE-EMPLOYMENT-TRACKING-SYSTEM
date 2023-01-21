<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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
    return view('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [StudentController::class, 'profile'])->name('dashboard.profile');
    Route::post('/dashboard/profile', [StudentController::class, 'update']);

    Route::get('/dashboard/job-profile', [StudentController::class, 'jobProfile'])->name('dashboard.job-profile');
    Route::post('/dashboard/job-profile', [StudentController::class, 'updateJobProfile']);
    Route::put('/dashboard/job-profile/send', [StudentController::class, 'sendJobProfile'])->name('dashboard.job-profile.send');

    Route::get('/dashboard/job-referee', [StudentController::class, 'jobReferee'])->name('dashboard.job-referee');
    Route::post('/dashboard/job-referee', [StudentController::class, 'updateJobReferee']);

    Route::get('/dashboard/change-password', [StudentController::class, 'changePassword'])->name('dashboard.change-password');
    Route::post('/dashboard/change-password', [StudentController::class, 'updateChangePassword']);
});
require __DIR__.'/auth.php';
