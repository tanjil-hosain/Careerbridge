<?php

use App\Http\Controllers\BackendController\ApplicationController;
use App\Http\Controllers\BackendController\CategoryController;
use App\Http\Controllers\BackendController\CompanyController;
use App\Http\Controllers\BackendController\JobController;
use App\Http\Controllers\BackendController\JobSeekerProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::get('/', function () {
//     return view('frontend.home');
// })->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//Admin Route--
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashbaord'])->name('dashboard');

    //categorY route---->
    Route::resource('/categories', CategoryController::class);
});


//Employer Route--
Route::prefix('employer')->middleware(['auth', 'role:employer'])->name('employer.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'employerDashboard'])->name('dashboard');

    Route::resource('/company', CompanyController::class);

    //Job Route--
    Route::resource('/jobs', JobController::class);
    Route::get('/jobs/{job}/applications', [JobController::class, 'applications'])
    ->name('jobs.applications');
});



//Job_seekers---
Route::prefix('job_seeker')->middleware(['auth', 'role:job_seeker'])->name('job_seeker.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'job_seekerdDashboard'])->name('dashboard');

    Route::resource('profile', JobSeekerProfileController::class);


    Route::get('/applications', [ApplicationController::class, 'index'])
    ->name('application.index');

    Route::get('/applications/create/{job}', [ApplicationController::class, 'create'])
        ->name('application.create');

    Route::post('/applications', [ApplicationController::class, 'store'])
        ->name('application.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Front end

Route::get('/jobs/{job}', [HomeController::class, 'jobDetails'])
    ->name('jobs.details');

require __DIR__ . '/auth.php';
