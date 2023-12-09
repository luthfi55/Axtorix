<?php

use App\Http\Controllers\Applier\ApplyController;
use App\Http\Controllers\Applier\ProfileController;
use App\Http\Controllers\Applier\CvController;
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
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile-cv/{id}', [CvController::class, 'index'])->name('profile-cv');
    Route::put('/update-data', [ProfileController::class, 'update'])->name('update-applier');
    Route::put('/update-picture', [ProfileController::class, 'updatePicture'])->name('update-picture');    
    Route::put('/update-resume', [CvController::class, 'updateResume'])->name('update-resume');    
    Route::post('/create-education', [CvController::class, 'createEducation'])->name('create-education');        
    Route::post('/create-experience', [CvController::class, 'createExperience'])->name('create-experience'); 
    Route::delete('/delete-education/{id}', [CvController::class, 'deleteEducation'])->name('delete-education');    
    Route::delete('/delete-experience/{id}', [CvController::class, 'deleteExperience'])->name('delete-experience');       
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
    Route::get('/detail-user/{id}', [JobController::class, 'userDetail'])->name('manager.user-detail');
    Route::get('/edit-profile/{id}', [JobController::class, 'editProfile'])->name('manager.edit-profile');
    Route::put('/update-profile', [JobController::class, 'updateProfile'])->name('manager.update-profile');
});