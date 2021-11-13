<?php

use App\Http\Controllers\VerifyWriterEmailController;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\Applications;
use App\Http\Livewire\Admin\Job;
use App\Http\Livewire\Client\ClientAuth;
use App\Http\Livewire\Client\ClientAuthentication;
use App\Http\Livewire\Client\ClientLogout;
use App\Http\Livewire\Client\Dashboard;
use App\Http\Livewire\Client\Invoice;
use App\Http\Livewire\General\Chat;
use App\Http\Livewire\Home;
use App\Http\Livewire\Order;
use App\Http\Livewire\Writer\Dashboard as WriterDashboard;
use App\Http\Livewire\Writer\Order\OrdersList;
use App\Http\Livewire\Writer\Settings;
use App\Http\Livewire\Writer\Writer;
use App\Http\Livewire\Writer\WriterAuthentication;
use App\Http\Livewire\Writer\WriterAuth;
use App\Http\Livewire\Writer\WriterLogout;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Route;
use App\Mail\VerifyAccountMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/email', function () {
    Mail::to('cleoctech@gmail.com')->send(new VerifyAccountMail('cleoctech@gmail.com'));
    return new VerifyAccountMail('cleoctech@gmail.com');
});
// Route::get('/verify-email', function () {
//     //check-email-token
//     //verify-email
//     //auth
//     return new WriterDashboard();
// });
// Route::post('/confirm-payment',[\App\Http\Controllers\PaymentController::class, 'store'])->name('confirm-payment');
Route::get('/verify-email/{mail}', [\App\Http\Controllers\VerifyWriterEmailController::class, 'verifyMail'])->name('verify-email');
// Route::get('/verify-email/{mail}', VerifyEmailController::class, 'verifyMail')->name('verify-email');
Route::post('upload', [\App\Http\Controllers\UploadController::class, 'store']);
Route::get('/', Home::class)->name('home');
Route::get('/order', Order::class)->name('create-order');
Route::get('/writer/get-started', Writer::class)->name('writer-get-started');


// Route::middleware(['AuthCheck', 'second'])->group(function () {

// });
// Route::get('/c/login', ClientAuth::class)->name('client-auth');
Route::group(['middleware' => ['AuthCheck']], function(){
    Route::get('/client/login', ClientAuth::class)->name('client-login');
    // Route::get('/c/login', ClientAuth::class)->name('client-auth');
    Route::get('/client/logout', ClientLogout::class)->name('client-logout');
    Route::get('/client/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/client/invoice', Invoice::class)->name('client-invoice');
    Route::get('/client/chat', Chat::class)->name('client-chat');
    Route::post('/confirm-payment',[\App\Http\Controllers\StripePaymentController::class, 'store'])->name('confirm-payment');

});
// Route::get('/w/login', WriterAuth::class)->name('writer-auth');
Route::group(['middleware' => ['AuthWriter']], function(){

    Route::get('/writer/login', WriterAuth::class)->name('writer-login');
    Route::get('/writer/logout', WriterLogout::class)->name('writer-logout');
    Route::get('/writer/dashboard', WriterDashboard::class)->name('writer-dashboard');
    Route::get('/writer/settings', Settings::class)->name('writer-settings');
    Route::get('/writer/chat', Chat::class)->name('writer-chat');
    Route::post('upload-id-front', [\App\Http\Controllers\UploadController::class, 'storeIdFront']);
    Route::post('upload-id-back', [\App\Http\Controllers\UploadController::class, 'storeIdBack']);
    Route::post('upload-selfie', [\App\Http\Controllers\UploadController::class, 'selfie']);
    Route::post('upload-cert', [\App\Http\Controllers\UploadController::class, 'certificate']);
    Route::post('upload-cert-selfie', [\App\Http\Controllers\UploadController::class, 'certSelfie']);
    Route::post('upload-cv', [\App\Http\Controllers\UploadController::class, 'cv']);

    Route::get('/writer/my-orders', OrdersList::class)->name('my-orders');
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    // Route::get('/client/dashboard', Dashboard::class);
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin-dashboard');
    Route::get('/admin/orders', Job::class)->name('view-orders');
    Route::get('/admin/chat', Chat::class)->name('admin-chat');
    Route::get('/admin/invoice', Invoice::class)->name('invoices');
    Route::get('/admin/chat', Chat::class)->name('admin-chat');
    Route::get('/admin/applications', Applications::class)->name('applications');
});