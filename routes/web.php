<?php

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/about_us", [HomeController::class, "about"])->name('about');
Route::get("/contact_us", [HomeController::class, "contact"])->name('contact');
Route::get("/service", [HomeController::class, "services"])->name('services');
Route::get("/faq", [HomeController::class, "faq"])->name('faq');
//Route::get("/tips", [HomeController::class, "tips"])->name('tips');

Route::post("/contact_us_mail", [ContactRequestController::class, "store"])->name('contact_us_mail');
Route::get('invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::post('invoice/paytabs/response', [InvoiceController::class, 'paytabsCheckoutResponse'])->name('invoice.paytabs.response');
Route::get('invoice/payment/thank-you', [InvoiceController::class, 'customerInvoiceThankYou'])->name('invoice.thankyou');

Route::resource('referrals', ReferralController::class)->only(['create', 'store']);

Auth::routes(['verify' => true]);

//Common Routes
Route::group(['middleware' => 'auth'], function () {
    Route::post('update-profile', [UserController::class, 'update_profile'])->name('update_profile');
    Route::post('change-password', [UserController::class, 'change_password'])->name('change_password');

    Route::post('notification/markAsRead', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');

    Route::post('send_otp_email', [UserController::class, 'send_otp_email'])->name('send_otp_email');
    Route::post('verify_otp', [UserController::class, 'verify_otp'])->name('verify_otp');
    Route::post('change_email', [UserController::class, 'change_email'])->name('change_email');
});

Route::get("{slug}", [HomeController::class, 'page'])->name('page');
Route::get("service/{slug}", [HomeController::class, 'service_page'])->name('service-page');


Route::get('/artisanCmdRun/clear', function () {
    // delete storage folder in public/storage
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    echo 'Done';
});
Route::get('/artisan/storage/link', function () {
    // delete storage folder in public/storage
    \Artisan::call('storage:link');
    echo 'Symlink process successfully completed';
});
