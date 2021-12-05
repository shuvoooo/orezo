<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/about_us", [HomeController::class, "about"])->name('about');
Route::get("/contact_us", [HomeController::class, "contact"])->name('contact');
Route::get("/services", [HomeController::class, "services"])->name('services');
Route::get("/faq", [HomeController::class, "faq"])->name('faq');
