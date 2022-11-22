<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('index', [HomeController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{id}', [UserController::class, 'details'])->name('details');
    });
});

Route::prefix('vacancies')->name('vacancies.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [VacancyController::class, 'index'])->name('index');
        Route::get('/{id}', [VacancyController::class, 'details'])->name('details');
    });

    Route::middleware(['auth', 'creator'])->group(function () {
        Route::get('/create', [VacancyController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [VacancyController::class, 'edit'])->name('edit');
        Route::post('/create', [VacancyController::class, 'store'])->name('post-create');
        Route::post('/edit', [VacancyController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [VacancyController::class, 'destroy'])->name('delete');
    });
});

Route::prefix('requests')->name('requests.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [RequestController::class, 'index'])->name('index');
        Route::get('/details/{id}', [RequestController::class, 'details'])->name('details');
        Route::get('/request-redirect', [RequestController::class, 'findMyRequest'])->name('request-redirect');
    });

    Route::middleware(['auth', 'creator'])->group(function () {
        Route::post('/edit', [RequestController::class, 'update'])->name('update');
    });

    Route::middleware(['auth', 'developer'])->group(function () {
        Route::post('/create', [RequestController::class, 'store'])->name('create');
        Route::post('/delete/{id}', [RequestController::class, 'destroy'])->name('delete');
    });
});

require __DIR__ . '/auth.php';
