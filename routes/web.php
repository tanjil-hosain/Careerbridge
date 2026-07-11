<?php

use App\Http\Controllers\BackendController\CategoryController;
use App\Http\Controllers\BackendController\CompanyController;
use App\Http\Controllers\BackendController\JobController;
use App\Http\Controllers\BackendController\JobSeekerProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('frontend.home');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//Admin Route--
Route::prefix('admin')->middleware(['auth','role:admin'])->name('admin.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'adminDashbaord'])->name('dashboard');

    //categorY route---->
    Route::resource('/categories',CategoryController::class);

});


//Employer Route--
Route::prefix('employer')->middleware(['auth', 'role:employer'])->name('employer.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'employerDashboard' ])->name('dashboard');

    Route::resource('/company', CompanyController::class);

    //Job Route--
    Route::resource('/jobs', JobController::class);
});

Route::prefix('job_seeker')->middleware(['auth', 'role:job_seeker'])->name('job_seeker.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'job_seekerdDashboard' ])->name('dashboard');

    Route::resource('profile', JobSeekerProfileController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
