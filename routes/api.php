<?php

use App\Http\Controllers\ScrapingController;
use Illuminate\Support\Facades\Route;

Route::get('/scraping', ScrapingController::class)->name('scraping');
