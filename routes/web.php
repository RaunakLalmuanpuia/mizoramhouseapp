<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FLAMController;
use App\Http\Controllers\OnDutyController;
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

//Route::get('/step-one', function () {
//    return Inertia::render('Form/StepOne', []);
//})->name('step-one');


//Route::get('/flam/step-two', function () {
//    return Inertia::render('Form/FLAM/StepTwo', []);
//})->name('flam-step-two');
//
//Route::get('/step-three', function () {
//    return Inertia::render('Form/StepThree', []);
//})->name('step-three');
//
//Route::get('/verify', function () {
//    return Inertia::render('Form/Verify', []);
//})->name('verify');

//Route::get('/flam/step-two', function () {
//    return Inertia::render('Form/FLAM/StepTwo', []);
//})->name('flam-step-two');


// routes/web.php

//Route::post('/flam/create-application', [\App\Http\Controllers\FlamApplicationController::class, 'createApplication'])->name('flam.create-application');
//
//Route::get('/flam/step-two/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'showStepTwo'])->name('flam.step-two');
//
//
//Route::post('/flam/store', [\App\Http\Controllers\FlamApplicationController::class, 'store'])->name('flam.store');
//
//Route::get('/flam/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'show'])->name('flam.details');
//
//
//Route::get('/flam/application/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'getApplication']);
//
//
//Route::get('/flam/location/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'showLocationStep'])->name('flam.location-step');
//


//Route::get('/flam/location/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'locationPage'])->name('flam.location');
//Route::post('/flam/location/{id}', [\App\Http\Controllers\FlamApplicationController::class, 'storeLocation'])->name('flam.storeLocation');


Route::group(['prefix'=>'apply'], function () {
    Route::get('step-one', [FLAMController::class, 'stepOne'])->name('step-one');
    Route::get('step-two', [FLAMController::class, 'stepTwo'])->name('flam.step-two');
    Route::get('step-three', [FLAMController::class, 'stepThree'])->name('flam.step-three');
    Route::get('verify', [FLAMController::class, 'verify'])->name('flam.verify');
    Route::get('submission', [FLAMController::class, 'submission'])->name('flam.submission');


    Route::post('step-one/store', [FLAMController::class, 'storeStepOne'])->name('apply.store-stepone');
    Route::post('step-two/store', [FLAMController::class, 'storeStepTwo'])->name('apply.store-steptwo');
    Route::post('step-three/store', [FLAMController::class, 'storeStepThree'])->name('apply.store-stepthree');
    Route::post('verify/store', [FLAMController::class, 'submit'])->name('apply.submit');
    Route::post('step-three/resubmit', [FLAMController::class, 'resubmit'])->name('apply.resubmit');
});


Route::group(['prefix'=>'on-duty'], function () {
//    Route::get('step-one', [OnDutyController::class, 'stepOne'])->name('on-duty.step-one');
    Route::get('step-two', [OnDutyController::class, 'stepTwo'])->name('on-duty.step-two');
    Route::get('step-three', [OnDutyController::class, 'stepThree'])->name('on-duty.step-three');
    Route::get('verify', [OnDutyController::class, 'verify'])->name('on-duty.verify');
    Route::get('submission', [OnDutyController::class, 'submission'])->name('on-duty.submission');


    Route::post('step-one/store', [OnDutyController::class, 'storeStepOne'])->name('apply.store-on-duty-stepone');
    Route::post('step-two/store', [OnDutyController::class, 'storeStepTwo'])->name('apply.store-on-duty-steptwo');
    Route::post('step-three/store', [OnDutyController::class, 'storeStepThree'])->name('apply.store-on-duty-stepthree');
    Route::post('verify/store', [OnDutyController::class, 'submit'])->name('apply.on-duty-submit');
    Route::post('step-three/resubmit', [OnDutyController::class, 'resubmit'])->name('apply.on-duty-resubmit');
});
