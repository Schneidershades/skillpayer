<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Wallet;
use App\WalletTransaction;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a wallet for the registering user
        $find_wallet =  Wallet::where('user_id', Auth::id())->first();
        if ($find_wallet == null){
            // if he/her dosent have a wallet
            $wallet = new Wallet;
            $wallet->user_id = Auth::id();
            $wallet->pv_balance = 0;
            $wallet->skill_coin_balance = 0;
            $wallet->save();
        }

        $profile = Profile::where('user_id', Auth::id())->first();
        if($profile == null){
            // if he doesent have just create
            $profile = new Profile;
            $profile->user_id =  Auth::id();
            $profile->save();
        }
        
        // $trfrm = WalletTransaction::where('title', 'Transfer Recieved')->orWhere('title', 'SKC Credit')->get();
        $trfrm = WalletTransaction::where('user_id', Auth::id())->where('title','SKC Credit')->sum('amount');
        
        $trfrmAdmin = WalletTransaction::where('user_id', Auth::id())->where('title','Transfer Recieved')->sum('amount');

        $trfto =  auth()->user()->walletTransactions()->where('user_id', Auth::id())->Where('title', 'SKC Debit')->sum('amount');
        
        $adminDebit = WalletTransaction::where('user_id', Auth::id())->where('title','Transfer Sent')->sum('amount');
        
        // $airtime = WalletTransaction::where('title', 'Airtime Purchase')->get();
        
        $salesData = WalletTransaction::where('user_id', Auth::id())->where('title','Internet Data Purchase')->sum('amount_paid');
        
        $salesAirtime = WalletTransaction::where('user_id', Auth::id())->where('title','AirTime Purchase')->sum('amount_paid');
        
        $salesPower = WalletTransaction::where('user_id', Auth::id())->where('title','Power Purchase')->sum('amount_paid');
        
        $salesSms = WalletTransaction::where('user_id', Auth::id())->where('title','Power Purchase')->sum('amount_paid');
        
        // $data = WalletTransaction::where('title', 'Internet Data Purchase')->get();
        // $power = WalletTransaction::where('title', 'Power Purchase')->get();
        // $spBonus = WalletTransaction::where('title', 'SP Bonus Reward')->get();
        // $wtd = WalletTransaction::where('title', 'Withdrawals')->get();
        
        // $sms = WalletTransaction::where('title', 'SMS Purchase')->get();
        
        return view('users.home')
            ->with('to', $trfto)
            ->with('from', $trfrm)
            ->with('trfrmAdmin', $trfrmAdmin)
            ->with('adminDebit', $adminDebit)
            ->with('salesSms', $salesSms)
            ->with('salesAirtime', $salesAirtime)
            ->with('salesPower', $salesPower)
            // ->with('salesData', $salesData)
            // ->with('withdrawals', $wtd)
            // ->with('recieved', $power)
            ->with('salesData', $salesData);
    }

   
}
