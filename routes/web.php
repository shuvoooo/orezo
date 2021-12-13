<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/about_us", [HomeController::class, "about"])->name('about');
Route::get("/contact_us", [HomeController::class, "contact"])->name('contact');
Route::get("/services", [HomeController::class, "services"])->name('services');
Route::get("/faq", [HomeController::class, "faq"])->name('faq');
Route::get("/tips", [HomeController::class, "tips"])->name('tips');


Auth::routes();

Route::group(['prefix' => 'user', 'middleware' => UserMiddleware::class], function () {

    Route::get('dashboard',[DashboardController::class,'user_dashboard'])->name('dashboard');

    Route::get('personal-information', [PersonalInformationController::class, 'personal_information'])->name('personal-information');

    Route::post('personal-information-save', 'UsersController@personal_information_save')->name('personal-information-save');

//    Route::post('/personal-information-save-spouse', 'UsersController@personal_information_save_spouse')->name('personal-information-save-spouse');
//
//    Route::get('/spouse-details', 'UsersController@spouse_details')->name('spouse-details');
//    Route::post('/spouse-details-save', 'UsersController@spouse_details_save')->name('spouse-details-save');
//
//    Route::get('/dependent-details', 'UsersController@dependent_details')->name('dependent-details');
//    Route::post('/dependent-details-save', 'UsersController@dependent_details_save')->name('dependent-details-save');
//    Route::delete('/dependent-details-distroy/{id}', 'UsersController@dependent_details_distroy')->name('dependent-details-distroy');
//
//    Route::get('/bank-details', 'UsersController@bank_details')->name('bank-details');
//    Route::post('/bank-details-save', 'UsersController@bank_details_save')->name('bank-details-save');
//
//    Route::get('/process-flow-chart', 'UsersController@process_flow_chart')->name('process-flow-chart');
//
//
//    Route::get('/personal-information-spouse', 'UsersController@personal_information_spouse')->name('personal-information-spouse');
//    Route::get('/personal-information', 'UsersController@personal_information')->name('personal-information');
//    Route::get('/personal-information', 'UsersController@personal_information')->name('personal-information');
//
//
//    Route::get('/upload-tax-documents', 'UsersController@upload_tax_documents')->name('upload-tax-documents');
//    Route::post('/upload-tax-documents-save', 'UsersController@upload_tax_documents_save')->name('upload-tax-documents-save');
//    Route::post('/remove-tax-documents', 'UsersController@remove_tax_documents')->name('remove-tax-documents');
//
//    Route::get('/download-tax-documents', 'UsersController@download_tax_documents')->name('download-tax-documents');
//
//    Route::post('/download-tax-documents-save', 'UsersController@download_tax_documents_save')->name('download-tax-documents-save');
//    Route::post('/user-documents-comment-save', 'UsersController@download_tax_documents_comment_save')->name('user-documents-comment-save');
//
//    Route::get('/my-file-status', 'UsersController@my_file_status')->name('my-file-status');
//
//    Route::get('/view-tax-summary', 'UsersController@view_tax_summery')->name('view-tax-summary');
//    Route::post('/post-payment-summary', 'UsersController@post_payment_summary')->name('post-payment-summary');
//    Route::get('/summary-payment-success', 'UsersController@summary_payment_success')->name('summary-payment-success');
//    Route::get('/summary-payment-failed', 'UsersController@summary_payment_failed')->name('summary-payment-failed');
//
//    Route::get('/payment-info', 'UsersController@payment_info')->name('payment-info');
//    Route::get('/invoice-details/{id}', 'UsersController@payment_info_details')->name('invoice-details');
//
//    Route::get('/refound-status', 'UsersController@refound_status')->name('refound-status');
//
//    Route::get('/account-setting', 'UsersController@account_setting')->name('account-setting');
//    Route::post('/account-setting-update', 'UsersController@account_setting_update')->name('account-setting-update');
//    Route::post('/change-password', 'UsersController@change_password')->name('change-password');

});
