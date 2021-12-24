<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ClientListController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\MyStatusController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResidencyController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\YearMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/about_us", [HomeController::class, "about"])->name('about');
Route::get("/contact_us", [HomeController::class, "contact"])->name('contact');
Route::get("/services", [HomeController::class, "services"])->name('services');
Route::get("/faq", [HomeController::class, "faq"])->name('faq');
Route::get("/tips", [HomeController::class, "tips"])->name('tips');


Auth::routes();


Route::group(['middleware' => ['auth', UserMiddleware::class]], function () {
    Route::get('year_profile', [DashboardController::class, 'year_dashboard'])->name('year_dashboard');

    Route::group(['prefix' => '{year}', 'middleware' => [YearMiddleware::class]], function () {
        Route::get('dashboard', [DashboardController::class, 'user_dashboard'])->name('dashboard');


        Route::group(['prefix' => 'info'], function () {
            Route::get('personal-information', [PersonalInformationController::class, 'personal_information'])->name('personal_information');
            Route::post('personal-information', [PersonalInformationController::class, 'personal_information_store'])->name('personal_information_store');


            Route::get('spouse-details', [PersonalInformationController::class, 'spouse_information'])->name('spouse_details');
            Route::post('spouse-details', [PersonalInformationController::class, 'spouse_information_store'])->name('spouse_details_store');

            Route::get('dependent-details', [PersonalInformationController::class, 'dependent_details'])->name('dependent_details');
            Route::post('dependent-details', [PersonalInformationController::class, 'dependent_details_store'])->name('dependent_details_store');
            Route::delete('dependent-details/{dependent_details}', [PersonalInformationController::class, 'dependent_details_destroy'])->name('dependent_details_destroy');

            Route::get('bank_details', [PersonalInformationController::class, 'bank_details'])->name('bank_details');
            Route::post('bank_details', [PersonalInformationController::class, 'bank_details_store'])->name('bank_details_store');

            Route::view('process-flow-chart', 'user.process_flow_chart')->name('process_flow_chart');
        });

        Route::group(['prefix' => 'tax'], function () {
            Route::get('employer_details', [EmployerController::class, 'employer_details'])->name('employer_details');
            Route::post('employer_details', [EmployerController::class, 'employer_details_store'])->name('employer_details_store');
            Route::delete('employer_details/{tax}', [EmployerController::class, 'employer_details_destroy'])->name('employer_details_destroy');

            Route::get('project', [ProjectController::class, 'project_details'])->name('project_details');
            Route::post('project', [ProjectController::class, 'project_details_store'])->name('project_details_store');
            Route::delete('project/{project}', [ProjectController::class, 'project_details_destroy'])->name('project_details_destroy');

            Route::get('residency', [ResidencyController::class, 'residency_details'])->name('residency_details');
            Route::post('residency', [ResidencyController::class, 'residency_details_store'])->name('residency_details_store');
            Route::delete('residency/{residency}', [ResidencyController::class, 'residency_details_destroy'])->name('residency_details_destroy');

            Route::get('expense', [ExpenseController::class, 'expense_details'])->name('expense_details');
            Route::post('expense', [ExpenseController::class, 'expense_details_store'])->name('expense_details_store');


            Route::get('asset', [AssetController::class, 'asset_details'])->name('asset_details');
            Route::post('asset', [AssetController::class, 'asset_details_store'])->name('asset_details_store');


            Route::get('miscellaneous', [MiscellaneousController::class, 'miscellaneous_details'])->name('miscellaneous_details');
            Route::post('miscellaneous', [MiscellaneousController::class, 'miscellaneous_details_store'])->name('miscellaneous_details_store');

            Route::get('upload-tax-documents', [DocumentController::class, 'upload_tax_documents'])->name('upload_tax_documents');
            Route::post('upload-tax-documents', [DocumentController::class, 'upload_tax_documents_store'])->name('upload_tax_documents_store');

        });

        Route::group(['prefix' => 'status'], function () {
            Route::get('my-file-status', [MyStatusController::class, 'my_file_status'])->name('my_file_status');
            Route::get('view-tax-summary', [MyStatusController::class, 'view_tax_summary'])->name('view_tax_summary');
            Route::get('payment-info', [MyStatusController::class, 'payment_info'])->name('payment_info');
        });
    });
});


Route::group(['middleware' => ['auth', AdminMiddleware::class], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('client-list', [ClientListController::class, 'client_list'])->name('client_list');
});
