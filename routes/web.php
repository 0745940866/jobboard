<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\PostController;
use App\Models\JobApplication;
use App\Models\Job;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔓 Public Pages
Route::view('/', 'home')->name('home');
Route::view('/careers', 'careers')->name('careers');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');
Route::get('/salaries', function () {
    $jobs = Job::all();
    return view('salaries', compact('jobs'));
})->name('salaries');
// 🔐 Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register']);

// 🔒 Protected Routes (Only Logged In Users)
Route::middleware('auth')->group(function () {

    // ✅ All users: See jobs, apply, and view their applications
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
    Route::get('/mobiles', [JobController::class, 'showMobiles'])->name('jobs.mobiles');
    Route::get('/companies', [JobController::class, 'companies'])->name('companies');

    Route::get('/apply/{job}', [JobController::class, 'apply'])->name('jobs.apply.form');
    Route::post('/jobs/{id}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply.submit');
    Route::get('/my-applications', [JobApplicationController::class, 'myApplications'])->name('jobs.my_applications');

    // 🛠 Admin Pages (admin access checked inside controller)
    Route::get('/post', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/post', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/admin/applications', [JobApplicationController::class, 'allApplications'])->name('admin.applications');

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/post-management', [PostController::class, 'index'])->name('post.index');

   Route::get('/admin/job-applications', function () {
    $applications = JobApplication::with(['user', 'job'])->get();
    return view('admin.job_applications', compact('applications'));
})->name('admin.job.applications');

Route::get('/admin/job-applications', [JobApplicationController::class, 'allApplications'])->name('admin.job.applications');


});
