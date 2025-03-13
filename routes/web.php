<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/step-one', function () {
    return Inertia::render('Form/StepOne', []);
})->name('step-one');


Route::get('/flam/step-two', function () {
    return Inertia::render('Form/FLAM/StepTwo', []);
})->name('flam-step-two');

Route::get('/step-three', function () {
    return Inertia::render('Form/StepThree', []);
})->name('step-three');

Route::get('/verify', function () {
    return Inertia::render('Form/Verify', []);
})->name('verify');

//Route::get('/flam/step-two', function () {
//    return Inertia::render('Form/FLAM/StepTwo', []);
//})->name('flam-step-two');


// routes/web.php

Route::post('/flam/create-application', [\App\Http\Controllers\FlamApplicationController::class, 'createApplication'])->name('flam.create-application');

Route::get('/flam/step-two/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'showStepTwo'])->name('flam.step-two');


Route::post('/flam/store', [\App\Http\Controllers\FlamApplicationController::class, 'store'])->name('flam.store');

Route::get('/flam/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'show'])->name('flam.details');


Route::get('/flam/application/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'getApplication']);


Route::get('/flam/location/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'showLocationStep'])->name('flam.location-step');



//Route::get('/flam/location/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'locationPage'])->name('flam.location');
Route::post('/flam/location/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'storeLocation'])->name('flam.storeLocation');
