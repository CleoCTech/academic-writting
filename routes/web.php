<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\Job;
use App\Http\Livewire\Client\ClientAuthentication;
use App\Http\Livewire\Client\ClientLogout;
use App\Http\Livewire\Client\Dashboard;
use App\Http\Livewire\Client\Invoice;
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
Route::get('/order', Order::class)->name('create-order');


// Route::middleware(['AuthCheck', 'second'])->group(function () {

// });
Route::group(['middleware' => ['AuthCheck']], function(){
    Route::get('/client/login', ClientAuthentication::class)->name('client-login');
    Route::get('/client/logout', ClientLogout::class)->name('client-logout');
    Route::get('/client/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/client/invoice', Invoice::class)->name('client-invoice');

});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    // Route::get('/client/dashboard', Dashboard::class);
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin-dashboard');
    Route::get('/admin/orders', Job::class)->name('view-orders');
});
