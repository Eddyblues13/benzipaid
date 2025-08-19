<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\WithdrawalController;

Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});
Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/terms', function () {
    return view('home.terms');
});

Route::get('/services', function () {
    return view('home.services');
});


Auth::routes();






Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('email-verify', [CustomAuthController::class, 'emailVerify'])->name('code');
Route::get('resend-code/{id}', [CustomAuthController::class, 'resendCode'])->name('resendCode');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('log_out', [CustomAuthController::class, 'signOut'])->name('logout');
Route::get('/logout', [CustomAuthController::class, 'logOut'])->name('logOut');
Route::get('ver-account', [CustomAuthController::class, 'verAccount'])->name('ver-account');


//User Dashboard routes

Route::prefix('user')->middleware('user')->group(function () {

    Route::get('home', [CustomAuthController::class, 'dashboard'])->name('home');
    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');


    Route::get('card', [HomeController::class, 'card'])->name('card');
    Route::get('card_application', [HomeController::class, 'cardApplication'])->name('card_application');
    Route::get('check', [HomeController::class, 'checkPage'])->name('check.page');
    Route::post('check', [HomeController::class, 'checkUpload'])->name('upload.check');
    Route::get('kyc', [HomeController::class, 'kycPage'])->name('kyc.page');
    Route::post('kyc', [HomeController::class, 'kycUpload'])->name('upload.kyc');
    Route::get('loan', [HomeController::class, 'loan'])->name('loan');
    Route::post('make-loan', [HomeController::class, 'makeLoan'])->name('make.loan');
    Route::get('skrill', [HomeController::class, 'skrill'])->name('skrill');
    Route::get('paypal', [HomeController::class, 'paypal'])->name('paypal');
    Route::get('bank', [HomeController::class, 'bank'])->name('bank');
    Route::get('crypto', [HomeController::class, 'crypto'])->name('crypto');
    Route::get('inter_bank_transfer', [HomeController::class, 'interBankTransfer'])->name('inter.bank.transfer');
    Route::get('local_bank_transfer', [HomeController::class, 'localBankTransfer'])->name('local.bank.transfer');
    Route::get('revolut_bank_transfer', [HomeController::class, 'revolutBankTransfer'])->name('revolut.bank.transfer');
    Route::get('wise_bank_transfer', [HomeController::class, 'wiseBankTransfer'])->name('wise.bank.transfer');
    Route::post('paypal-transfer', [HomeController::class, 'paypalTransfer'])->name('paypal.transfer');
    Route::post('skrill-transfer', [HomeController::class, 'skrillTransfer'])->name('skrill.transfer');
    Route::post('crypto-transfer', [HomeController::class, 'cryptoTransfer'])->name('crypto.transfer');
    Route::post('inter-transfer', [HomeController::class, 'interTransfer'])->name('inter.transfer');
    Route::post('local-transfer', [HomeController::class, 'localTransfer'])->name('local.transfer');
    Route::post('revolut-transfer', [HomeController::class, 'revolutTransfer'])->name('revolut.transfer');
    Route::post('wise-transfer', [HomeController::class, 'wiseTransfer'])->name('wise.transfer');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');

    Route::post('/validate-code', [HomeController::class, 'validateVatCode'])->name('validate.vatCode');


    Route::get('loading-routing-number', [HomeController::class, 'loadingRoutingNumber'])->name('loading-routing-number');
    Route::get('loading-int-code', [HomeController::class, 'loadingIntCode'])->name('loading-int-code');
    Route::get('loading-ccic-code', [HomeController::class, 'loadingCcicCode'])->name('loading-ccid-code');
    Route::get('/transaction-successful', [HomeController::class, 'transactionSuccess'])->name('transaction.success');
    Route::get('loading', [HomeController::class, 'loading'])->name('loading');
    Route::get('/transaction-successful', [HomeController::class, 'transactionSuccess'])->name('transaction.success');
});




Route::post('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');
Route::post('make-payment', [DashboardController::class, 'makePayment'])->name('make.payment');
Route::get('transfer', [DashboardController::class, 'transferPage'])->middleware('user_auth')->name('transfer.page');
Route::get('user-profile', [DashboardController::class, 'userProfile'])->name('user.profile');
Route::post('save_nft', [DashboardController::class, 'saveNft'])->name('save.nft');
Route::get('request-card/{user_id}', [DashboardController::class, 'requestCard'])->name('request.card');
Route::get('change-password', [DashboardController::class, 'userChangePassword'])->name('user.change.password');
Route::get('deposit', [DashboardController::class, 'deposit'])->name('deposit');
Route::get('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');

Route::get('notification', [DashboardController::class, 'notification'])->name('notification');
Route::get('transactions', [DashboardController::class, 'transactions'])->name('transactions');
Route::get('pending-transfer', [DashboardController::class, 'pendingTransfer'])->name('pending-transfer');
Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
Route::get('make_withdrawal', [DashboardController::class, 'getWithdrawal'])->name('withdrawal');
Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
Route::get('transaction-history', [DashboardController::class, 'transactionHistory'])->name('transaction.history');
Route::get('view_invoice/{user_id}', [DashboardController::class, 'viewInvoice'])->name('view.invoice');
Route::get('ticket', [DashboardController::class, 'ticket'])->name('ticket');
Route::get('international-transfer', [DashboardController::class, 'internationalTransfer'])->name('international-transfer');
Route::get('domestic-transfer', [DashboardController::class, 'domesticTransfer'])->name('domestic-transfer');

Route::post('transfer', [DashboardController::class, 'transferFunds'])->name('transfer-fund');
Route::post('personal-details', [DashboardController::class, 'personalDetails'])->name('personal.details');
Route::post('personal-dp', [DashboardController::class, 'personalDp'])->name('personal.dp');
Route::post('transfer_funds', [DashboardController::class, 'transferFunds'])->name('transfer.funds');





Route::get('admin/login', [AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('login.submit');



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Protecting admin routes using the 'admin' middleware
    Route::middleware(['admin'])->group(function () { // Admin Profile Routes
        Route::get('/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/password', [AdminController::class, 'updatePassword'])->name('admin.profile.password.update');

        Route::get('/change/user/password/page/{id}', [AdminController::class, 'showResetPasswordForm'])->name('admin.change.user.password.page');
        Route::post('/user-password-reset', [AdminController::class, 'resetPassword'])->name('admin.user.password_reset');

        Route::get('{user}/verification', [AdminController::class, 'userVerification'])->name('user.verification');
        Route::get('{user}/suspension', [AdminController::class, 'userSuspension'])->name('user.suspension');


        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
        // Users Management
        Route::get('/users', [AdminController::class, 'index'])->name('admin.users');
        Route::get('/users/list', [AdminController::class, 'index'])->name('admin.users.list'); // For AJAX
   
        Route::get('/payment-settings', [AdminController::class, 'paymentSettings'])->name('payment.settings');
        Route::get('/manage-users', [AdminController::class, 'manageUsersPage'])->name('manage.users.page');
        Route::get('/manage-transactions', [AdminController::class, 'manageTransactionsPage'])->name('manage.transactions.page');
        Route::get('/transactions/delete/{id}', [AdminController::class, 'deleteTransaction'])->name('delete.transaction');
        Route::get('/transactions/approve/{id}', [AdminController::class, 'approveTransaction'])->name('approve.transaction');
        Route::get('/manage-investment-plan', [AdminController::class, 'manageInvestmentPlan'])->name('manage.investment.plan');
        Route::get('/view-deposit/{id}/', [AdminController::class, 'viewDeposit']);
        Route::get('/manage-kyc', [AdminController::class, 'manageKycPage'])->name('manage.kyc.page');
        Route::get('/accept-kyc/{id}/', [AdminController::class, 'acceptKyc'])->name('admin.accept.kyc');
        Route::get('/reject-kyc/{id}/', [AdminController::class, 'rejectKyc'])->name('admin.reject.kyc');
        Route::post('/reset-password/{user}', [AdminController::class, 'resetUserPassword'])->name('reset.password');
        Route::get('/clear-account/{id}', [AdminController::class, 'clearAccount'])->name('clear.account');

        Route::get('/{user}/impersonate',  [AdminController::class, 'impersonate'])->name('users.impersonate');
        Route::get('/leave-impersonate',  [AdminController::class, 'leaveImpersonate'])->name('users.leave-impersonate');

        Route::post('/edit-user/{user}', [AdminController::class, 'editUser'])->name('edit.user');
        Route::post('/add-new-user',  [AdminController::class, 'newUser'])->name('add.user');
        Route::get('/delete-user/{user}',  [AdminController::class, 'deleteUser'])->name('delete.user');

        // Route for viewing user details
        Route::get('/user/{id}', [AdminController::class, 'viewUser'])->name('admin.user.view');
        Route::post('/transfer/suspend/{id}', [AdminController::class, 'suspendTransfer'])->name('transfer.suspend');
        Route::post('/transfer/unblock/{id}', [AdminController::class, 'unblockTransfer'])->name('transfer.unblock');
        Route::post('/account/suspend/{id}', [AdminController::class, 'suspendAccount'])->name('account.suspend');
        Route::post('/account/unblock/{id}', [AdminController::class, 'unblockAccount'])->name('account.unblock');

        // Define the route for opening an account
        Route::get('/user/open', [AdminController::class, 'openAccount'])->name('admin.user.open');





        Route::post('credit-debit', [AdminController::class, 'creditDebit'])->name('credit-debit');
        Route::post('credit', [AdminController::class, 'credit'])->name('credit');
        Route::post('debit', [AdminController::class, 'debit'])->name('debit');





        // Route for updating user details
        Route::post('/user/update/{id}', [AdminController::class, 'updateUserDetail'])->name('update_user_detail');

        // Route for updating bank details
        Route::post('/user/update/bank/{id}', [AdminController::class, 'updateBankDetail'])->name('update_bank_detail');

        // Route for fund user
        Route::get('/user/fund/{accountnumber}/{id}', [AdminController::class, 'fundUser'])->name('fund_user');

        // Route for user transaction history
        Route::get('/user/transaction/{id}', [AdminController::class, 'userTransaction'])->name('user_transaction');

        // Route for user transfer tracking
        Route::get('/user/transfer/tracking/{id}', [AdminController::class, 'userTransferTracking'])->name('user_transfer_tracking');

        // Route for debit user
        Route::get('/user/debit/{accountnumber}/{id}', [AdminController::class, 'debitUser'])->name('debit_user');

        // Route for changing user photo
        Route::get('/user/photo/{id}', [AdminController::class, 'updatePhoto'])->name('update_photo');

        // Route for user activity
        Route::get('/user/activity/{id}', [AdminController::class, 'userActivity'])->name('user_activity');

        // Route for user password reset
        Route::get('/user/password/reset/{userid}', [AdminController::class, 'userPasswordReset'])->name('user_password_reset');


        // Route for changing email user
        Route::get('/send/email', [AdminController::class, 'sendEmailPage'])->name('send.email');
        Route::post('/send/email', [AdminController::class, 'sendEmail'])->name('send.mail');


        // Deposit resource routes
        Route::resource('deposits', DepositController::class);
        Route::patch('deposits/{deposit}/approve', [DepositController::class, 'approve'])->name('deposits.approve');

        // Withdrawal resource routes
        Route::resource('withdrawals', WithdrawalController::class);
        Route::patch('withdrawals/{withdrawal}/approve', [WithdrawalController::class, 'approve'])->name('withdrawals.approve');



        //trade resource routes
        Route::get('/trades', [TradeController::class, 'index'])->name('trades.index');
        Route::get('/trades/{trade}/edit', [TradeController::class, 'edit'])->name('trades.edit');
        Route::patch('/trades/{trade}', [TradeController::class, 'update'])->name('trades.update');
        Route::post('/trades/{trade}/approve', [TradeController::class, 'approve'])->name('trades.approve');
        Route::delete('/trades/{trade}', [TradeController::class, 'destroy'])->name('trades.destroy');





        Route::get('/manage-deposit', [DepositController::class, 'manageDepositsPage'])->name('manage.deposits.page');
        Route::get('view-deposit/{id}', [DepositController::class, 'viewDeposit'])->name('view.deposit');;
        Route::get('process-deposit/{id}', [DepositController::class, 'processDeposit'])->name('process.deposit');
        Route::get('delete-deposit/{id}', [DepositController::class, 'deleteDeposit'])->name('delete.deposit');


        Route::get('/manage-withdrawal', [WithdrawalController::class, 'manageWithdrawalsPage'])->name('manage.withdrawals.page');
        Route::get('/view-withdrawal/{user_id}/{withdrawal_id}', [WithdrawalController::class, 'viewWithdrawal'])->name('view.withdrawal');;
        Route::get('process-withdrawal/{id}', [WithdrawalController::class, 'processWithdrawal'])->name('process.withdrawal');
        Route::get('delete-withdrawal/{id}', [WithdrawalController::class, 'deleteWithdrawal'])->name('delete.withdrawal');

        Route::get('kyc', [KycController::class, 'showKycRequests'])->name('admin.kyc.index');
        Route::post('kyc/approve/{id}', [KycController::class, 'approveKyc'])->name('admin.kyc.approve');
        Route::post('kyc/reject/{id}', [KycController::class, 'rejectKyc'])->name('admin.kyc.reject');

        Route::get('deposit', [DepositController::class, 'showDepositRequests'])->name('admin.deposit.index');
        Route::post('deposit/approve/{id}', [DepositController::class, 'approveDeposit'])->name('admin.deposit.approve');
        Route::post('deposit/reject/{id}', [DepositController::class, 'rejectDeposit'])->name('admin.deposit.reject');

        Route::match(['get', 'post'], '/send-user-mail', [MailController::class, 'sendMail'])->name('admin.send.mail');
        // Route to show the send email form
        Route::get('/send-mail', [MailController::class, 'showSendMailForm'])->name('admin.send.mail.form');

        // Route to handle sending email to all users
        Route::post('/send-all-usermail', [MailController::class, 'sendMailToAll'])->name('send.mail.all');

        Route::match(['get', 'post'], 'vat-code', [AdminController::class, 'vatCode'])->name('vat-code');
    });
});
