<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WalletTransaction;
use App\Wallet;

use App\Models\Products\AirtimeTransaction;
use App\Models\Products\DataTransaction;
use App\Models\Products\DigitalTvTransaction;
use App\Models\Products\PowerTransaction;
use App\SmsTextTransaction;
use App\Models\Products\AgricLoan;

class TransactionController extends Controller
{
    public function transactions()
    {
    	$wallet = WalletTransaction::orderBy('id', 'desc')->get();

    	return view('admin.transaction.wallet.index')
			->with('history', $wallet);
    }

    public function airtimeTransactions()
    {
    	$airtime = AirtimeTransaction::orderBy('id', 'desc')->get();
    	return view('admin.transaction.airtime.index')
    		->with('history', $airtime);
    }

    public function powerTransactions()
    {
    	$power = PowerTransaction::orderBy('id', 'desc')->get();
    	return view('admin.transaction.power.index')
    		->with('history', $power);
    }

    public function dataTransactions()
    {
    	$data = DataTransaction::orderBy('id', 'desc')->get();
    	return view('admin.transaction.data.index')
    		->with('history', $data);
    }

    public function smsTransactions()
    {
    	$sms = SmsTextTransaction::orderBy('id', 'desc')->get();
    	return view('admin.transaction.sms.index')
    		->with('history', $sms);
    }

    public function tvTransactions()
    {
    	$tv = DigitalTvTransaction::orderBy('id', 'desc')->get();
    	return view('admin.transaction.tv.index')
    		->with('history', $tv);
    }


    public function showPowerTransaction($identifier){
        $transaction = PowerTransaction::where('identifier', $identifier)->first();
        return view('admin.transaction.power.show')->with('transaction', $transaction);
    }

    public function showAirtimeTransaction($identifier){
        $transaction = AirtimeTransaction::where('identifier', $identifier)->first();
        return view('admin.transaction.airtime.show')->with('transaction', $transaction);
    }

    public function showDataTransaction($identifier){
        $transaction = DataTransaction::where('identifier', $identifier)->first();
        return view('admin.transaction.data.show')->with('transaction', $transaction);
    }

    public function showDigitalTvTransaction($identifier){
        $transaction = DigitalTvTransaction::where('identifier', $identifier)->first();
        return view('admin.transaction.tv.show')->with('transaction', $transaction);
    }

    public function showSmsTextTransaction($identifier){
        $transaction = SmsTextTransaction::where('identifier', $identifier)->first();
        return view('admin.transaction.sms.show')->with('transaction', $transaction);
    }

    public function showWalletTransaction($identifier){
        $transaction = WalletTransaction::where('identifier', $identifier)->first();
        return view('admin.transaction.wallet.show')->with('transaction', $transaction);
    }


    public function refundTransaction($identifier)
    {

        $checkTransactionToRefund = AirtimeTransaction::where('identifier', $identifier)->first();

        if($checkTransactionToRefund === null){
            $checkTransactionToRefund = PowerTransaction::where('identifier', $identifier)->first();
        }

        if($checkTransactionToRefund === null){
            $checkTransactionToRefund = DataTransaction::where('identifier', $identifier)->first();
        }

        if($checkTransactionToRefund === null){
            $checkTransactionToRefund = DigitalTvTransaction::where('identifier', $identifier)->first();
        }

        if($checkTransactionToRefund === null){
            $checkTransactionToRefund = SmsTextTransaction::where('identifier', $identifier)->first();
        }

        

        $refundWallet = WalletTransaction::where('identifier', $identifier)->first();


        if($refundWallet === null){
            return redirect()->back()->with('error', 'Unable to process Transaction. Transaction not found on user wallet transaction');
        }

        // if($refundWallet != null || $checkTransactionToRefund === null){
        //     return redirect()->back()->with('error', 'Transaction in Wallet Transaction not found');
        // }

        if($checkTransactionToRefund->status == 'Failed'){
            return redirect()->back()->with('error', 'Unable to make transaction. User was not debited when the transaction failed');
        }

        if($checkTransactionToRefund->status == 'Refund' || $checkTransactionToRefund->status == 'Refunded' || $refundWallet->remarks == 'Refunded'){
            return redirect()->back()->with('error', 'Transaction Already Refunded');
        }

        if($checkTransactionToRefund->status == 'Fulfilled' || $checkTransactionToRefund->status == 'Success' || $checkTransactionToRefund->status == 'Successful'){
            return redirect()->back()->with('error', 'Cannot Refund Wallet Transaction was successful');
        }

        $checkTransactionToRefund->status = 'Refund';

        $checkTransactionToRefund->save();

        $find_wallet = Wallet::where('user_id', $refundWallet->user_id)->first();

        // deduct wallet
        $find_wallet->skill_coin_balance +=  $refundWallet->amount_paid;        

        $find_wallet->save();


        $refundWallet->title = 'Refund';
        $refundWallet->remarks = 'Refunded';
        $refundWallet->transaction_type = 'Credit';
        $refundWallet->balance = $find_wallet->skill_coin_balance;

        $refundWallet->save();

        return redirect()->back()->with('success', 'User Transaction Refund was Successful');
    } 
    
    public function agricSubscription()
    {
        $agricLoans = AgricLoan::where('finished', true)->get();

        return view('admin.transaction.agricLoan.index')
            ->with('loans', $agricLoans);
    } 

    public function showAgricSubscription($identifier)
    {
        $agricLoan = AgricLoan::where('identifier', $identifier)->first();

        return view('admin.transaction.agricLoan.show')
            ->with('loan', $agricLoan);
    } 
}
