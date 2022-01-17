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
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GeneralConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\MyStatusController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResidencyController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\YearMiddleware;
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

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', UserMiddleware::class, 'verified']], function () {
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

        Route::get('download_tax_documents', [DocumentController::class, 'download_tax_documents'])->name('download_tax_documents');


        Route::get('account-settings', [UserController::class, 'update_profile_view'])->name('user_profile_view');
    });
});


Route::group(['middleware' => ['auth', AdminMiddleware::class], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('client-details', [ClientListController::class, 'client_details'])->name('client_details');
    Route::get('client-list', [ClientListController::class, 'client_list'])->name('client_list');

    Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('invoice/{invoice}/edit', [InvoiceController::class, 'update'])->name('invoice.update');
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
    Route::post('file-status/{user}', [FileStatusController::class, 'add_file_status'])->name('file_status.add_file_status');
    Route::get('file-status/{file_status}/delete', [FileStatusController::class, 'delete_file_status'])->name('file_status.delete_file_status');

    Route::get('download-tax-document/{user}', [TaxDocumentController::class, 'download_tax_document'])->name('download_tax_document');
    Route::get('user-tax-document/{user}', [TaxDocumentController::class, 'user_tax_document'])->name('user_tax_document');

    Route::resource('staff', StaffController::class);

    Route::resource('page', PageController::class);

    Route::get('/account-settings', [UserController::class, 'update_profile_view'])->name('profile_view');
});

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
