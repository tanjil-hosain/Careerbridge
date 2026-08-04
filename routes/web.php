<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\BackendController\AdminCompanyController;
use App\Http\Controllers\BackendController\AdminApplicationController;
use App\Http\Controllers\BackendController\AdminJobController;
use App\Http\Controllers\BackendController\ApplicationController;
use App\Http\Controllers\BackendController\CategoryController;
use App\Http\Controllers\BackendController\CompanyController;
use App\Http\Controllers\BackendController\EmployerApplicationController;
use App\Http\Controllers\BackendController\JobController;
use App\Http\Controllers\BackendController\JobSeekerProfileController;
use App\Http\Controllers\BackendController\PlanController;
use App\Http\Controllers\BackendController\SubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\ApplicationController as FrontendApplicationController;
use App\Http\Controllers\Frontend\CompanyController as FrontendCompanyController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobController as FrontendJobController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\SavedJobController as FrontendSavedJobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
// Route::get('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'register']);


// Route::get('/', function () {
//     return view('frontend.home');
// })->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//Admin Route--
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admindashboard'])->name('dashboard');

    //categorY route---->
    Route::resource('/categories', CategoryController::class);

    Route::resource('plans', PlanController::class);

    Route::resource('companies', AdminCompanyController::class)->only(['index', 'show', 'destroy']);
    Route::resource('jobs', AdminJobController::class)->only(['index', 'show', 'destroy']);
    Route::resource('applications', AdminApplicationController::class)->only(['index', 'show', 'destroy']);
});


//Employer Route--
Route::prefix('employer')->middleware(['auth', 'role:employer'])->name('employer.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'employerDashboard'])->name('dashboard');

    Route::resource('/company', CompanyController::class);

    //Job Route--
    Route::resource('/jobs', JobController::class);
    Route::get('/jobs/{job}/applications', [JobController::class, 'applications'])
        ->name('jobs.applications');

    Route::get('/applications/{application}', [EmployerApplicationController::class, 'showApplication'])
        ->name('applications.show');

    Route::put('/applications/{application}', [EmployerApplicationController::class, 'updateApplication'])
        ->name('applications.update');

    Route::get('/subscription/plans', [SubscriptionController::class, 'employerPlans'])
        ->name('subscription.plans');

    Route::get('/subscription/{plan}/checkout', [SubscriptionController::class, 'checkout'])
        ->name('subscription.checkout');

    Route::post('/subscription/pay', [SubscriptionController::class, 'pay'])
        ->name('subscription.pay');

    Route::get('/my-subscription', [SubscriptionController::class, 'mySubscription'])
        ->name('subscription.my');
});



//Job_seekers---
Route::prefix('job_seeker')->middleware(['auth', 'role:job_seeker'])->name('job_seeker.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'jobSeekerDashboard'])->name('dashboard');

    Route::resource('profile', JobSeekerProfileController::class);


    Route::get('/applications', [ApplicationController::class, 'index'])
        ->name('application.index');

    Route::get('/applications/create/{job}', [ApplicationController::class, 'create'])
        ->name('application.create');

    Route::post('/applications', [ApplicationController::class, 'store'])
        ->name('application.store');

    Route::get('/subscription/plans', [SubscriptionController::class, 'jobSeekerPlans'])
        ->name('subscription.plans');

    Route::get('/subscription/{plan}/checkout', [SubscriptionController::class, 'checkout'])
        ->name('subscription.checkout');

    Route::post('/subscription/pay', [SubscriptionController::class, 'pay'])
        ->name('subscription.pay');

    Route::get('/my-subscription', [SubscriptionController::class, 'mySubscription'])
        ->name('subscription.my');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Front end

Route::controller(FrontendJobController::class)->group(function () {

    Route::get('/jobs', 'index')->name('jobs.index');

    Route::get('/jobs/{slug}', 'show')->name('jobs.show');
});



Route::middleware('auth')->group(function () {

    Route::get('/jobs/{job:slug}/apply', [FrontendApplicationController::class, 'create'])
        ->name('jobs.apply.create');

    Route::post('/jobs/{job:slug}/apply', [FrontendApplicationController::class, 'store'])
        ->name('jobs.apply.store');
});

Route::controller(FrontendCompanyController::class)->group(function () {

    Route::get('/companies', 'index')->name('companies.index');

    Route::get('/companies/{company}', 'show')->name('companies.show');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/saved-jobs', [FrontendSavedJobController::class, 'index'])->name('saved.jobs.index');
    Route::post('/job/save-toggle', [FrontendSavedJobController::class, 'toggle'])->name('job.save.toggle');
});



Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store'); 


//Google Login


Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');

require __DIR__ . '/auth.php';
