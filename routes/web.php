<?php

use App\User;

Route::get('/tree', function (){
	$user = User::find(3);

	$referrings = $user->referrals;

	return view('home')
		->with('user', $user)
		->with('referrals', $referrings);
});


Route::get('/verify/users', 'User\ServiceController@usersverify');


Route::get('/digitalTv', 'Products\DigitalTvController@digitalTv')->name('service.digitalTv');

Route::get('/', function () {
    return view('users.welcome');
});

Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
    
    return 'good';
});

Auth::routes();


Route::get('verify/{token}', 'User\UserController@verify')->name('verify');
Route::get('resend/activation\mail', 'User\UserController@sendToken')->name('activation.mail');
Route::post('resend/activation\mail', 'User\UserController@resend')->name('activate');

Route::get('/airtime/try', 'Products\AirtimeController@vendAirtimeApiTry');

Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/latest', 'PagesController@latest')->name('latest');
Route::get('/packages', 'PagesController@packages')->name('packages');
Route::get('/reward', 'PagesController@reward')->name('reward');
Route::get('/search', 'PagesController@search')->name('search');
Route::get('/tour', 'PagesController@tour')->name('tour');


Route::get('/partners-page', 'PagesController@partnersPage')->name('partners');

Route::get('/find-user', 'PagesController@searchUser')->name('find.user');

Route::get('/advert/{slug}/details/', 'PagesController@advertSingle')->name('advertSingle');

Route::get('/bonus', 'Products\AirtimeController@getReward');

Route::get('/secret', 'User\ServiceController@usersSlug');


Route::get('/vtpass', 'Service\ApiProviders\VtpassController@serviceCategory');
Route::get('/serve/{identifier}', 'Service\ApiProviders\VtpassController@services');
Route::get('/final', 'Service\ApiProviders\VtpassController@servicesVariations');

Route::get('/cron', 'User\ServiceController@fetchAll');
Route::get('/js/data/{network}', 'Products\JsController@getDataPlans');
Route::get('/js/tv/{network}', 'Products\JsController@getTvBouquet');
Route::get('/js/states/{country_id}', 'Products\JsController@getStates');
Route::get('/js/city/{state_id}', 'Products\JsController@getCity');
Route::get('/js/advert-subcategory/{category_id}', 'Products\JsController@getAdvertSubCategories');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/paystack/response', 'User\PaymentController@handleGatewayCallback');

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function(){

	Route::group(['middleware' => ['admin']], function(){

		Route::get('/users', 'Admin\UserController@index')->name('admin.users.index');

		Route::get('user/edit/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
		Route::post('user/update/{id}', 'Admin\UserController@update')->name('admin.user.update');

		Route::get('user/partner/home', 'Admin\PartnerController@index')->name('admin.partner.index');
		Route::post('user/partner/store', 'Admin\PartnerController@store')->name('admin.partner.store');
		Route::get('user/partner/delete/{id}', 'Admin\PartnerController@destroy')->name('admin.partner.delete');

		Route::get('user/transactions/{id}', 'Admin\UserController@userTransactions')->name('admin.user.transactions');

		Route::get('user/credit/wallet/{id}', 'Admin\UserController@showWalletCredit')->name('admin.user.credit');
		Route::post('user/credit/wallet/update/{id}', 'Admin\UserController@walletCreditUpdate')->name('admin.user.credit.update');


		Route::get('user/debit/wallet/{id}', 'Admin\UserController@showWalletDebit')->name('admin.user.debit');
		Route::post('user/debit/wallet/update/{id}', 'Admin\UserController@walletDebitUpdate')->name('admin.user.debit.update');

		Route::get('user/change/password/{id}', 'Admin\UserController@showChangePassword')->name('admin.user.change.password');
		Route::post('user/change/password/update/{id}', 'Admin\UserController@changePasswordUpdate')->name('admin.user.change.password.update');

		Route::get('user/change/package/{id}', 'Admin\UserController@showChangePackage')->name('admin.user.change.package');
		Route::post('user/change/package/update/{id}', 'Admin\UserController@changePackageUpdate')->name('admin.user.change.package.update');

		Route::get('user/package-transactions', 'Admin\UserController@packageTransactions')->name('admin.package-transactions');
		Route::get('user/package-transactions/{transactions}', 'Admin\UserController@packageTransactionShow')->name('admin.package-transactions.show');

		Route::get('user/wallet/edit/{id}', 'Admin\WalletController@edit')->name('admin.wallet.edit');
		Route::post('user/wallet/update/{id}', 'Admin\WalletController@update')->name('admin.wallet.update');
		Route::get('/withdrawal/', 'Admin\WithdrawalController@index')->name('admin.withdrawal.index');
		Route::get('/withdrawals/clear', 'Admin\WithdrawalController@clear')->name('admin.withdrawal.clear');


		Route::get('users/transactions/wallet-history', 'Admin\TransactionController@transactions')->name('admin.wallet.history');
		Route::get('users/transactions/wallet-history/{identifier}', 'Admin\TransactionController@showWalletTransaction')->name('admin.wallet.details');

		Route::get('users/transaction/airtime', 'Admin\TransactionController@airtimeTransactions')->name('admin.airtime.history');
		Route::get('users/transaction/airtime/{identifier}', 'Admin\TransactionController@showAirtimeTransaction')->name('admin.airtime.details');

		Route::get('usesr/transaction/power', 'Admin\TransactionController@powerTransactions')->name('admin.power.history');
		Route::get('users/transaction/power/{identifier}', 'Admin\TransactionController@showPowerTransaction')->name('admin.power.details');

		Route::get('users/transaction/data', 'Admin\TransactionController@dataTransactions')->name('admin.data.history');
		Route::get('users/transaction/data/{identifier}', 'Admin\TransactionController@showDataTransaction')->name('admin.data.details');

		Route::get('users/transaction/tv', 'Admin\TransactionController@tvTransactions')->name('admin.tv.history');
		Route::get('users/transaction/tv/{identifier}', 'Admin\TransactionController@showDigitalTvTransaction')->name('admin.tv.details');

		Route::get('users/transaction/sms', 'Admin\TransactionController@smsTransactions')->name('admin.sms.history');
		Route::get('users/transaction/sms/{identifier}', 'Admin\TransactionController@showSmsTextTransaction')->name('admin.sma.details');
		
		Route::get('users/transaction/agric-loan', 'Admin\TransactionController@agricSubscription')->name('admin.agric-loan.history');
		Route::get('users/transaction/agric-loan/{identifier}', 'Admin\TransactionController@showAgricSubscription')->name('admin.agric-loan.details');

		Route::get('users/refund/transaction/{identifier}', 'Admin\TransactionController@refundTransaction')->name('admin.refund.transaction');

	});


});

Route::group(['prefix' => '/user', 'middleware' => ['auth']], function(){


	Route::get('/partner/home', 'User\PartnerController@index')->name('account.partner.index');

	Route::group(['prefix' => '/team'], function(){	
		Route::get('/users', 'User\NetworkController@index')->name('account.network.index');
		Route::get('/users/profile/{slug}/', 'User\NetworkController@profile')->name('account.network.profile');
	});

	Route::group(['prefix' => '/transfers'], function(){
		Route::get('/', 'User\TransferController@index')->name('account.transfers.index');
		Route::get('/{transfer}/edit', 'User\TransferController@edit')->name('account.transfers.edit');
		Route::patch('/{transfer}', 'User\TransferController@update')->name('account.transfers.update');
		Route::post('/{transfer}', 'User\TransferController@store')->name('account.transfers.store');
		Route::get('/create', 'User\TransferController@create')->name('account.transfers.create.start');
		Route::get('/{transfer}', 'User\TransferController@show')->name('account.transfers.show');
		Route::get('/{transfer}/create', 'User\TransferController@create')->name('account.transfers.create');
	});
	
	Route::group(['prefix' => '/security'], function(){
		Route::get('/change', 'User\SecurityController@edit')->name('account.security.edit');
		Route::post('/update/{id}', 'User\SecurityController@update')->name('account.security.update');
	});


	Route::group(['prefix' => '/wallet'], function(){
		Route::get('/', 'User\WalletController@index')->name('account.wallet.index');
		Route::get('/{transfer}/edit', 'User\WalletController@edit')->name('account.wallet.edit');
		Route::patch('/{transfer}', 'User\WalletController@update')->name('account.wallet.update');
		Route::post('/create/{transfer}', 'User\WalletController@store')->name('account.wallet.store');
		Route::get('/create', 'User\WalletController@create')->name('account.wallet.create.start');
		Route::get('/{transfer}', 'User\WalletController@show')->name('account.wallet.show');
		Route::get('/{transfer}/create', 'User\WalletController@create')->name('account.wallet.create');
	});

Route::group(['prefix' => '/buypackage'], function(){
		Route::get('/', 'User\BuyPackageController@index')->name('account.buy.package.index');
		Route::get('/{transaction}/edit', 'User\BuyPackageController@edit')->name('account.buy.package.edit');
		Route::patch('/{transaction}', 'User\BuyPackageController@update')->name('account.buy.package.update');
		Route::post('/create/{transaction}', 'User\BuyPackageController@store')->name('account.buy.package.store');
		Route::get('/create', 'User\BuyPackageController@create')->name('account.buy.package.create.start');
		Route::get('/{transaction}', 'User\BuyPackageController@show')->name('account.buy.package.show');
		Route::get('/{transaction}/create', 'User\BuyPackageController@create')->name('account.buy.package.create');
	});

	Route::group(['prefix' => '/withdrawal'], function(){
		Route::get('/', 'User\WithdrawalController@index')->name('account.withdrawal.index');
		Route::get('/{transaction}/edit', 'User\WithdrawalController@edit')->name('account.withdrawal.edit');
		Route::patch('/{transaction}', 'User\WithdrawalController@update')->name('account.withdrawal.update');
		Route::post('/create/{transaction}', 'User\WithdrawalController@store')->name('account.withdrawal.store');
		Route::get('/create', 'User\WithdrawalController@create')->name('account.withdrawal.create.start');
		Route::get('/{transaction}', 'User\WithdrawalController@show')->name('account.withdrawal.show');
		Route::get('/{transaction}/create', 'User\WithdrawalController@create')->name('account.withdrawal.create');
	});

	Route::group(['prefix' => '/advert'], function(){
		Route::get('/', 'User\AdvertController@index')->name('account.advert.index');
		Route::get('/{transaction}/create', 'User\AdvertController@create')->name('account.advert.create');
		Route::get('/create', 'User\AdvertController@create')->name('account.advert.create.start');
		Route::get('/{transaction}/edit', 'User\AdvertController@edit')->name('account.advert.edit');
		Route::patch('/{transaction}', 'User\AdvertController@update')->name('account.advert.update');
		Route::post('/create/{transaction}', 'User\AdvertController@store')->name('account.advert.store');
		Route::get('/{transaction}', 'User\AdvertController@show')->name('account.advert.show');
	});

	Route::group(['prefix' => '/profile'], function(){	
		Route::get('/', 'User\ProfileController@index')->name('account.profile.index');
		Route::get('/{profile}/edit', 'User\ProfileController@edit')->name('account.profile.edit');
		Route::post('/update/{id}', 'User\ProfileController@update')->name('account.profile.update');
		Route::get('/{profile}', 'User\ProfileController@show')->name('account.profile.show');
	});

	Route::group(['prefix' => '/history'], function(){	
		Route::get('/', 'User\TransactionController@index')->name('account.history.index');
	});

	Route::post('/pay', 'User\PaymentController@redirectToGateway')->name('pay');

	Route::post('/{advert}/upload', 'User\UploadController@store')->name('upload.store');
	Route::get('/{advert}/upload/{upload}', 'User\UploadController@destroy')->name('upload.destroy');
	Route::get('/storage/{photo}', 'User\UploadController@getPhoto')->name('uploaded.image');

	Route::group(['prefix' => '/service'], function(){
		Route::get('/', 'User\ServiceController@index')->name('services');
		Route::post('/airtime', 'Products\AirtimeController@processAirtime')->name('process.airtime');
		Route::post('/data', 'Products\DataController@data')->name('process.data');
		Route::post('/power', 'Products\PowerController@processPwr')->name('process.power');
		Route::post('/sms', 'Products\SMSController@processSMS')->name('service.sms');
		Route::post('/tv/process', 'Products\DigitalTvController@processTv')->name('process.tv');
		Route::get('/digitalTv', 'Products\DigitalTvController@digitalTv')->name('service.digitalTv');
		
// 		agric loan
		
		Route::get('/agric-loan/', 'Products\AgricLoanController@index')->name('agric-loan.index');
		Route::get('/agric-loan/show/{id}', 'Products\AgricLoanController@show')->name('agric-loan.show');
		Route::get('/agric-loan/edit/{id}', 'Products\AgricLoanController@edit')->name('agric-loan.edit');	
		Route::post('/agric-loan/update/{id}', 'Products\AgricLoanController@update')->name('agric-loan.update');	
		Route::get('/agric-loan/pay/{id}', 'Products\AgricLoanController@makePayment')->name('agric-loan.payment');	
		Route::get('/agric-loan/register/{id}', 'Products\AgricLoanController@subscribe')->name('agric-loan.register');
	});
});