<?php

use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ClientListController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FileStatusController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TaxDocumentController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\YearAccessController;
use App\Http\Controllers\GeneralConfigController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', AdminMiddleware::class], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('client', [ClientListController::class, 'index'])->name('client.index');
    Route::get('client/{user}', [ClientListController::class, 'client_show'])->name('client.show');
    Route::delete('client/{user}', [ClientListController::class, 'client_delete'])->name('client.delete');

    Route::get('client-list', [ClientListController::class, 'client_list'])->name('client_list');

    Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('invoice/{user}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('invoice/{user}/edit', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::get('invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
    Route::get('invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');


    Route::resource('service', ServiceController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('team', TeamController::class);
    Route::resource('faq', FaqController::class);

    Route::resource('general-config', GeneralConfigController::class);

    Route::get("home-page", [HomePageController::class, 'edit'])->name('home_page.edit');
    Route::post("home-page", [HomePageController::class, 'update'])->name('home_page.update');

    Route::get("about-page", [AboutPageController::class, 'edit'])->name('about_page.edit');
    Route::post("about-page", [AboutPageController::class, 'update'])->name('about_page.update');

    Route::get('file-status/{user}', [FileStatusController::class, 'file_status'])->name('file_status.file_status');
    Route::post('file-status/{user}/{year}', [FileStatusController::class, 'add_file_status'])->name('file_status.add_file_status');
    Route::get('file-status/{file_status}/delete', [FileStatusController::class, 'delete_file_status'])->name('file_status.delete_file_status');

    Route::get('file-status', [FileStatusController::class, 'index'])->name('file_status.index');


    Route::get('download-tax-document/{user}', [TaxDocumentController::class, 'download_tax_document'])->name('download_tax_document');
    Route::post('download-tax-document/{user}/{year}', [TaxDocumentController::class, 'download_tax_document_store'])->name('download_tax_document_store');
    Route::delete('download-tax-document/{id}', [TaxDocumentController::class, 'download_tax_document_delete'])->name('download_tax_document_delete');
    Route::post('download-tax-document/{id}/download', [TaxDocumentController::class, 'download_tax_document_download'])->name('download_tax_document_download');

    Route::post('comment/{user}/{year}', [TaxDocumentController::class, 'comment_store'])->name('comment.store');

    Route::get('user-tax-document/{user}', [TaxDocumentController::class, 'user_tax_document'])->name('user_tax_document');
    Route::get('user-tax-document/{upload}/download', [TaxDocumentController::class, 'download_user_tax_document'])->name('download_user_tax_document');


    Route::resource('staff', StaffController::class);

    Route::resource('page', PageController::class);

    Route::get('year_access', [YearAccessController::class, 'edit'])->name('year_access.edit');
    Route::post('year_access', [YearAccessController::class, 'update'])->name('year_access.update');


    Route::get('referrals', [ReferralController::class, 'index'])->name('referrals.index');
    Route::get('referrals/{refer}/delete', [ReferralController::class, 'delete'])->name('referrals.delete');

    Route::get('account-settings', [UserController::class, 'update_profile_view'])->name('profile_view');
});
