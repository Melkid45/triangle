<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('career', [PageController::class, 'career'])->name('career');
Route::get('career/{slug}', [PageController::class, 'careerDetails'])->name('career.details');
Route::get('career-form/{slug}', [PageController::class, 'careerForm'])->name('career.form');
Route::get('/our-works', [PageController::class, 'works'])->name('works');

Route::get('/contact', function(){
    return view('app.contact');
})->name('contact');


