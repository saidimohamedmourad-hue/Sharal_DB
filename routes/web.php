<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\CompanyController; 



Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //users
    Route::resource('user', UserController::class );
    route::put('user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
    //job applications
    Route::resource('job-application', JobApplicationController::class);
        route::put('job-application/{id}/restore', [JobApplicationController::class, 'restore'])->name('job-application.restore');
    //job categories
    Route::resource('job-category', JobCategoryController::class);
    route::put('job-category/{id}/restore', [JobCategoryController::class, 'restore'])->name('job-category.restore');
    //job vacancies
    Route::resource('job-vacancy', JobVacancyController::class);
       route::put('job-vacancy/{id}/restore', [JobVacancyController::class, 'restore'])->name('job-vacancy.restore');
    //companies
    Route::resource('company', CompanyController::class);  
    route::put('company/{id}/restore', [CompanyController::class, 'restore'])->name('company.restore');
    
    //profile

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
