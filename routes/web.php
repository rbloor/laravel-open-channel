<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');

Route::view('privacy-policy', 'user.page.privacy-policy')->name('privacy-policy');
Route::view('cookie-policy', 'user.page.cookie-policy')->name('cookie-policy');
Route::view('terms-and-conditions', 'user.page.terms-and-conditions')->name('terms-and-conditions');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

    Route::group(['middleware' => 'role:user'], function () {
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::view('profile', 'user.profile.index')->name('profile');
        Route::view('how-it-works', 'user.page.how-it-works')->name('how-it-works');
        Route::view('basket', 'user.basket.index')->name('basket');
        Route::resource('feedback', App\Http\Controllers\FeedbackController::class)->only(['create', 'store']);
        Route::resource('product', App\Http\Controllers\ProductController::class)->only(['index']);
        Route::resource('reward', App\Http\Controllers\RewardController::class)->only(['index']);
        Route::resource('sale', App\Http\Controllers\SaleController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('redemption', App\Http\Controllers\RedemptionController::class)->only(['index', 'destroy']);
        Route::resource('checkout', App\Http\Controllers\CheckoutController::class)->only(['index', 'store']);
        Route::get('/checkout/confirmation/{order_number}', [App\Http\Controllers\CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
    });

    Route::group(['middleware' => 'role:super-admin|wmc-admin|wmc-editor|client-admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
        Route::view('reporting', 'admin.reporting')->name('reporting');

        Route::group(['prefix' => 'tool', 'as' => 'tool.'], function () {
            Route::view('bulk-sales-importer', 'admin.tool.bulk-sales-importer')->name('bulk-sales-importer');
            Route::resource('setting', App\Http\Controllers\Admin\SettingController::class)->except(['show']);
            Route::resource('offer', App\Http\Controllers\Admin\OfferController::class)->except(['show']);
        });

        Route::resource('transaction', App\Http\Controllers\Admin\TransactionController::class)->only(['index', 'create', 'store']);
        Route::resource('sale', App\Http\Controllers\Admin\SaleController::class)->only(['index']);
        Route::resource('redemption', App\Http\Controllers\Admin\RedemptionController::class)->only(['index']);
        Route::resource('membership', App\Http\Controllers\Admin\MembershipController::class)->only(['index']);
        Route::resource('page', App\Http\Controllers\Admin\PageController::class)->except(['show']);
        Route::resource('resource', App\Http\Controllers\Admin\ResourceController::class)->except(['show']);
        Route::resource('product', App\Http\Controllers\Admin\ProductController::class)->except(['show']);
        Route::resource('product_category', App\Http\Controllers\Admin\ProductCategoryController::class)->except(['show']);
        Route::resource('product_offer', App\Http\Controllers\Admin\ProductOfferController::class)->except(['show']);
        Route::resource('reward', App\Http\Controllers\Admin\RewardController::class)->except(['show']);
        Route::resource('reward_category', App\Http\Controllers\Admin\RewardCategoryController::class)->except(['show']);
        Route::resource('company', App\Http\Controllers\Admin\CompanyController::class)->except(['show']);
        Route::resource('company_category', App\Http\Controllers\Admin\CompanyCategoryController::class)->except(['show']);
        Route::resource('user', App\Http\Controllers\Admin\UserController::class)->except(['show']);
        Route::resource('feedback', App\Http\Controllers\Admin\FeedbackController::class)->only(['index', 'destroy']);

        Route::get('users/export/', [App\Http\Controllers\Admin\ReportController::class, 'exportUsers'])->name('users.export');
        Route::get('memberships/export/', [App\Http\Controllers\Admin\ReportController::class, 'exportMemberships'])->name('memberships.export');
        Route::get('sales/export/', [App\Http\Controllers\Admin\ReportController::class, 'exportSales'])->name('sales.export');
        Route::get('redemptions/export/', [App\Http\Controllers\Admin\ReportController::class, 'exportRedemptions'])->name('redemptions.export');
        Route::get('transactions/export/', [App\Http\Controllers\Admin\ReportController::class, 'exportTransactions'])->name('transactions.export');

        Route::post('ckeditor', [App\Http\Controllers\Admin\CKEditorController::class, 'store']);
    });
});
