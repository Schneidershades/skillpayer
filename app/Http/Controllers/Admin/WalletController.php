<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WalletTransaction;
use App\User;
use App\Wallet;
use Session;

class WalletController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.userWalletTop')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reciever = User::where('id', $id)->first();
        $amountToCredit = $request->amount;
        $pvAmountToCredit = $request->sp_amount;

        if ($reciever === null) {
           Session::flash('error', 'Receiving user does not match users record');
           return redirect()->back();
        }
        

        // find wallet of who user is sending to
        $credit_coin = Wallet::where('user_id', $reciever->id)->first();
        
        // credit not
        $credit_coin->skill_coin_balance = $amountToCredit;
        $credit_coin->pv_balance = $pvAmountToCredit;

        // save all
        $credit_coin->save();
        
        // dd($credit_coin);

        // $walletTransactionCredit = new WalletTransaction;
        // $walletTransactionCredit->title = 'SKC Credit';
        // $walletTransactionCredit->user_id = $reciever->id;
        // $walletTransactionCredit->details = 'SKC Transfer From Admin';
        // $walletTransactionCredit->amount = $amountToCredit;
        // $walletTransactionCredit->category = 'Credit';
        // $walletTransactionCredit->remarks = 'success';
        // $walletTransactionCredit->transaction_type = 'transfer';

        // $walletTransactionPvCredit = new WalletTransaction;
        // $walletTransactionPvCredit->title = 'SP Credit';
        // $walletTransactionPvCredit->user_id = $reciever->id;
        // $walletTransactionPvCredit->details = 'PV Transfer From Admin';
        // $walletTransactionPvCredit->amount = $pvAmountToCredit;
        // $walletTransactionPvCredit->category = 'Credit';
        // $walletTransactionPvCredit->remarks = 'success';
        // $walletTransactionPvCredit->transaction_type = 'transfer';

        // $walletTransactionPvCredit->save();

        // $walletTransactionCredit->save();

        
        return redirect()->route('admin.users.index')->with('success', 'Your credit transaction was successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
