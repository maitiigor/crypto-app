<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsDisabled;
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

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {

    Route::middleware([IsDisabled::class])->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/withdrawal/payment/{id}', [App\Http\Controllers\AdminDashboardController::class, 'payWithdrawalRequest'])->name('withdrawal.payment');
        Route::get('/customer/deposit', [App\Http\Controllers\CustomerDashboardController::class, 'deposit'])->name('customer.deposit');
        Route::get('/customer/referal', [App\Http\Controllers\CustomerDashboardController::class, 'referals'])->name('customer.referals');
        Route::get('/customer/deposits', [App\Http\Controllers\CustomerDashboardController::class, 'depositList'])->name('customer.deposit-list');
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
        Route::get('/withdrawal', [App\Http\Controllers\CustomerDashboardController::class, 'withdrawal'])->name('withdrawal');
        Route::put('/profile', [App\Http\Controllers\HomeController::class, 'saveProfile'])->name('save-profile');
        Route::get('customer/earnings', [App\Http\Controllers\CustomerDashboardController::class, 'getEarnings'])->name('customer.earnings');
        Route::post('customer/withdrawal', [App\Http\Controllers\CustomerDashboardController::class, 'saveWithdrawal'])->name('customer.withdrawal');
        Route::post('customer/deposit', [App\Http\Controllers\CustomerDashboardController::class, 'saveDeposit'])->name('customer.save-deposit');
    });
    
    Route::middleware([IsAdmin::class])->group(function () {
        
        Route::get('/withdrawal/payment/{id}', [App\Http\Controllers\AdminDashboardController::class, 'payWithdrawalRequest'])->name('withdrawal.payment');
        Route::resource('investment_plans', \App\Http\Controllers\InvestmentPlanController::class);
        Route::get('account/disable/{id}', [App\Http\Controllers\AdminDashboardController::class, 'accountDisable'])->name('account.disable');
        Route::resource('earnings', \App\Http\Controllers\EarningController::class);
        Route::resource('deposits', \App\Http\Controllers\DepositController::class);
        Route::resource('payments', \App\Http\Controllers\PaymentController::class);
        Route::resource('Payment_details', \App\Http\Controllers\PaymentDetailController::class);
        Route::resource('referals', \App\Http\Controllers\ReferalController::class);
        Route::resource('withdrawals', \App\Http\Controllers\WithdrawalController::class);
        Route::resource('payment_methods', \App\Http\Controllers\PaymentMethodController::class);
        Route::resource('users', \App\Http\Controllers\UserController::class);
        Route::resource('deposits', \App\Http\Controllers\DepositController::class);

    });
});

Auth::routes();
Route::get('/faqs', [App\Http\Controllers\FrontEndController::class, 'faq'])->name('faqs');
Route::get('/rules', [App\Http\Controllers\FrontEndController::class, 'rules'])->name('rules');
Route::get('/support', [App\Http\Controllers\FrontEndController::class, 'support'])->name('support');
Route::post('/support', [App\Http\Controllers\FrontEndController::class, 'saveSupport'])->name('support.save');

/* Route::get('sync-role', function () {
    auth()->user()->syncRoles('admin');
}); */
