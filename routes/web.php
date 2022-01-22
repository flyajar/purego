<?php

use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    return view('body');
});

Route::get('/success', function () {
    toast('We\'ve received your donation. Thank you for helping us reach our goals','success');

    return redirect('/');
});

Route::get('/failed', function () {
    toast('There\'s a problem with your donation. Please try again later','error');

    return redirect('/');
});

Route::post('/donate', [DonationController::class, 'store'])->name('donation.store');
