<?php

use App\Http\Livewire\Client\Dashboard;
use App\Http\Livewire\Home;
use App\Http\Livewire\Order;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('upload', [\App\Http\Controllers\UploadController::class, 'store']);
Route::get('/', Home::class);
Route::get('/order', Order::class);
Route::get('/client/dashboard', Dashboard::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
