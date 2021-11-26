<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BreakdownController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\PendingLendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RepairController;
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

Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::resource('/computers', ComputerController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/pendinglends', PendingLendController::class);
    Route::resource('/lends', LendController::class);
    Route::resource('/repairs', RepairController::class);
    Route::resource('/providers', ProviderController::class);
    Route::resource('/breakdowns', BreakdownController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/logs', LogController::class);
});

require __DIR__ . '/auth.php';
