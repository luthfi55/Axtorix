<?php

use App\Http\Controllers\Applier\ApplyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Recruiter\JobController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


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


//All Roles Can Acess
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/recruit-register', [RegisterController::class, 'recruiterPage']);
Route::match(['get', 'post'], '/list-job', [JobController::class, 'jobList'])->name('jobList');
Route::get('/detail-job/{job}', [JobController::class, 'jobDetail'])->name('jobDetail');

Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::post('/create-apply', [ApplyController::class, 'create'])->name('create-apply');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {   
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->prefix('manager')->group(function () {
    Route::get('/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/post-job', [JobController::class, 'index'])->name('manager.post-job');
    Route::post('/create-job', [JobController::class, 'create'])->name('manager.create-job');
    Route::get('/manage-job', [JobController::class, 'manage'])->name('manager.manage-job');
    Route::get('/manage-job/{job}', [JobController::class, 'manageDetail'])->name('job.detail');
});