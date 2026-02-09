<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('career', [PageController::class, 'career'])->name('career');
Route::get('career/{slug}', [PageController::class, 'careerDetails'])->name('career.details');
Route::get('career-form/{slug}', [PageController::class, 'careerForm'])->name('career.form');
Route::get('/our-works', [PageController::class, 'works'])->name('works');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Send

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::post('/apply-job', [JobApplicationController::class, 'send'])->name('job.apply');