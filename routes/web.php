<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RescueBabyController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [WelcomeController::class, 'index']);

Route::get('/', function () {
    return redirect('admin');
});

// Route::get('/contact', [ContactController::class, 'index']);


Route::resource('babies', RescueBabyController::class);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get("finishPayment", [PaymentController::class, "finishPayment"])->name("finishPayment");
Route::get("cancelPayment", [PaymentController::class, "cancelPayment"])->name("cancelPayment");
