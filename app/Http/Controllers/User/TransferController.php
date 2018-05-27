<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transfer;
use App\User;
use App\Wallet;
use App\WalletTransaction;
use Session;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('users.transfers.index')
            ->with('transfers', Transfer::where('finished', true));
    }

    protected function createAndReturnSkeletonfile()
    {
        return auth()->user()->sendMoney()->create([
            'status' => 'pending',
            'finished' => 0,
            'amount' => 0,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Transfer $transfer)
    {
        if(!$transfer->exists){
            $transfer = $this->createAndReturnSkeletonfile();

            return redirect()->route('account.transfers.create', $transfer);
        }
        return view('users.transfers.create')
            ->with('transfer', $transfer);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transfer $transfer)
    {
        $receiver = User::where('email', $request->email)->first();
        
        if ($receiver === null) {
           Session::flash('error', 'Receiving user does not match users record');
           return redirect()->back();
        }else{

            // check if user wants to send to himself
            if ($receiver->id == Auth()->user()->id){

                Session::flash('error', 'You are now on our violations activity log!! dont try to make such transaction again. Thank you');
                return redirect()->back();
            }
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

            // find wallet of who user is sending to
            $credit_coin = Wallet::where('user_id', $receiver->id)->first();
            
            

            // credit not
            $credit_coin->skill_coin_balance += $request->amount;
            
            

            // save all
            $debit_coin->save();
            $credit_coin->save();

            $transfer->reciever_id = $receiver->id;
            $transfer->sender_id = Auth()->user()->id;
            $transfer->amount = $request->amount;
            $transfer->purpose = $request->purpose;
            $transfer->status = 'fulfilled';
            $transfer->finished = true;

            $walletTransactionDebit = new WalletTransaction;
            $walletTransactionDebit->title = 'Transfer Sent';
            $walletTransactionDebit->identifier = $transfer->identifier;
            $walletTransactionDebit->user_id = Auth()->user()->id;
            $walletTransactionDebit->details = 'Money Transfer to '  . $request->email .'  purpose: '. $request->purpose;
            $walletTransactionDebit->amount = $request->amount;
            $walletTransactionDebit->amount_paid = $request->amount;
            $walletTransactionDebit->category = 'Transfer';
            $walletTransactionDebit->remarks = 'success';
            $walletTransactionDebit->transaction_type = 'Credit';
            $walletTransactionDebit->balance = $debit_coin->skill_coin_balance;

            $walletTransactionCredit = new WalletTransaction;
            $walletTransactionCredit->title = 'Transfer Recieved';
            $walletTransactionCredit->identifier = $transfer->identifier;
            $walletTransactionCredit->user_id = $receiver->id;
            $walletTransactionCredit->details = 'Recieving Transfer From '  . Auth()->user()->email.' purpose: '. $request->purpose;
            $walletTransactionCredit->amount = $request->amount;
            $walletTransactionCredit->amount_paid = $request->amount;
            $walletTransactionCredit->category = 'Transfer';
            $walletTransactionCredit->remarks = 'success';
            $walletTransactionCredit->transaction_type = 'Credit';
            $walletTransactionCredit->balance =  $credit_coin->skill_coin_balance;


            $walletTransactionDebit->save();
            $walletTransactionCredit->save();
            $transfer->save();
            
        }

        

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
