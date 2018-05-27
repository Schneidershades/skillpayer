<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Withdrawal;
use App\WalletTransaction;
use App\Wallet;
use Session;

class WithdrawalController extends Controller
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
    public function create(Withdrawal $withdrawal)
    {
        if(!$withdrawal->exists){
            $withdrawal = $this->createAndReturnSkeletonfile();

            return view('users.withdrawal.create')
            ->with('withdrawal', $withdrawal);
        }
        return view('users.withdrawal.create')
            ->with('withdrawal', $withdrawal);
    }

    protected function createAndReturnSkeletonfile()
    {
        return auth()->user()->withdrawals()->create([
            'status' => 'Not Available',
            'finished' => 0,
            'amount' => 0,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Withdrawal $withdrawal)
    {
        // find the user wallet
        $debit_coin = Wallet::where('user_id', '=' ,Auth()->user()->id)->first();

        // check if user has money
        if($debit_coin->skill_coin_balance < $request->amount){
            Session::flash('error', 'Insufficent Funds');
            return redirect()->back();
        }else{
            // deduct what you are sending
            $debit_coin->skill_coin_balance -= $request->amount;
        }

        // save all
        $debit_coin->save();

        $withdrawal->title = 'Withdrawals For ' . Auth()->user()->name;
        $withdrawal->user_id = Auth()->user()->id;
        $withdrawal->account_number = $request->account_number;
        $withdrawal->bank = $request->bank;
        $withdrawal->account_name = $request->account_name;
        $withdrawal->amount = $request->amount;
        $withdrawal->status = 'Pending';
        $withdrawal->finished = true;
        
        
        $withdrawal->save();

        $walletDebit = new WalletTransaction;
        $walletDebit->title = 'Withdrawals';
        $walletDebit->identifier = $withdrawal->identifier;
        $walletDebit->user_id = Auth()->user()->id;
        $walletDebit->details = 'WithdrawalTransaction'  . $request->email;
        $walletDebit->amount = $request->amount;
        $walletDebit->amount_paid = $request->amount;
        $walletDebit->category = 'Debit';
        $walletDebit->remarks = 'success';
        $walletDebit->transaction_type = 'Debit';
        $walletDebit->balance = $debit_coin->skill_coin_balance;

        $walletDebit->save();
        

        Session::flash('success', 'Your transfer transaction was successful');
        return redirect()->back();
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
        //
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
        //
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
