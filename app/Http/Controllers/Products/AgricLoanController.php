<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Wallet;
use App\WalletTransaction;
use App\Models\Products\AgricLoan;
use App\Http\Controllers\Controller;
use Session;

class AgricLoanController extends Controller
{
    public function index()
    {

        $user = User::where('id', Auth::id())->first();

        $agricLoanProfile = AgricLoan::where('user_id', Auth::id())->first();

        if($agricLoanProfile != null){
            return redirect()->route('agric-loan.edit', Auth::id());
        }else{

           return view('users.service.agricLoan.index')
                ->with('user', $user);
        }

        // if($agricLoanProfile->finished == false){

        //     return view('users.service.agricLoan.edit')
        //     ->with('user', $user);
        // }

       
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = User::find($id);
        
         $agricLoanProfile = AgricLoan::where('user_id', Auth::id())->first();

        if($user->agricLoanProfile == null){
            // if he doesent have just create
            $agricLoanProfile = new AgricLoan;
            $agricLoanProfile->user_id =  Auth::id();
            $agricLoanProfile->subscribe =  true;
            $agricLoanProfile->save();

            return view('users.service.agricLoan.edit')
                ->with('user', Auth::user());

        }elseif ($agricLoanProfile->finished == false){

            return redirect()->route('agric-loan.edit', $agricLoanProfile->user_id)
                    ->with('success', 'You information is under review');
        }
        
        
        return view('users.service.agricLoan.show')
            ->with('user', $user);

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

        $agricLoanProfile = AgricLoan::where('user_id', Auth::id())->first();

        if($user->agricLoanProfile == null){
            // if he doesent have just create
            $agricLoanProfile = new AgricLoan;
            $agricLoanProfile->user_id =  Auth::id();
            $agricLoanProfile->subscribe =  true;
            $agricLoanProfile->save();

            return view('users.service.agricLoan.edit')
                ->with('user', Auth::user());

        }elseif ($agricLoanProfile->subscribe == true && $agricLoanProfile->finished == true){

            return redirect()->route('agric-loan.show', $agricLoanProfile->user_id)
                    ->with('success', 'You information is under review');
        }


        return view('users.service.agricLoan.edit')
                ->with('user', Auth::user());
    }


    public function update(Request $request, $id)
    {
        
        $user = User::find($id);

        if ($user->agricLoanProfile->subscribe == true && $user->agricLoanProfile->finished == true){
            return view('users.service.agricLoan.show')
                ->with('user', $user)
                ->with('success', 'You information is under review');
        }


        if($user->agricLoanProfile == null){
            // if he doesent have just create
            $agricLoanProfile = new AgricLoan;
            $agricLoanProfile->user_id =  Auth::id();
            $agricLoanProfile->subscribe =  true;
            $agricLoanProfile->save();
        }

        $agricLoanProfile = AgricLoan::where('user_id', Auth::id())->first();

        $agricLoanProfile->full_name = $request->full_name;
        $agricLoanProfile->phone_number = $request->phone_number;
        $agricLoanProfile->dob = $request->dob;
        $agricLoanProfile->gender = $request->gender;
        $agricLoanProfile->profession = $request->profession;
        $agricLoanProfile->home_address = $request->home_address;
        $agricLoanProfile->address = $request->address;
        $agricLoanProfile->business_name = $request->business_name;
        $agricLoanProfile->employment_status = $request->employment_status;
        $agricLoanProfile->bvn = $request->bvn;
        $agricLoanProfile->account_bank_name = $request->account_bank_name;
        $agricLoanProfile->account_number = $request->account_number;
        $agricLoanProfile->guarantor_name = $request->guarantor_name;
        $agricLoanProfile->guarantor_phone_number = $request->guarantor_phone_number;
        $agricLoanProfile->guarantor_address = $request->guarantor_address;
        $agricLoanProfile->identity = $request->identity;
        $agricLoanProfile->finished = true;


        $agricLoanProfile->save();

        // if($request->has('full_name')){
        //     $user->profile->fullname = $request->full_name;
        // }

        // if($request->has('address')){
        //     $user->profile->address = $request->address;
        // }

        // if($request->has('phone_number')){
        //     $user->profile->phone_number = $request->phone_number;
        // }

        // $user->profile->save();


        return redirect()->route('agric-loan.show', $agricLoanProfile->user_id)->with('success', 'Your agric loan profile has been updated on your profile');

    }

    // $table->string('paid')->default('Pending')->nullable();

    public function makePayment($id)
    {
        $amount = 5000;

        $findWallet = Wallet::where('user_id', $id)->first();

        if($findWallet == null){
            return redirect()->back()->with('error', 'Cannot access your wallet at the moment please contact support');
        }

        // check if user has money
        if($findWallet->skill_coin_balance < $amount){
            Session::flash('error', 'Insufficent Funds to migrate package. please top your wallet.');
            return redirect()->back();
        }else{
            $findWallet->skill_coin_balance -= $amount;

            $findWallet->save();
        }

        $agricLoanProfile = AgricLoan::where('user_id', Auth::id())->first();
        

        $walletTransactionDebit = new WalletTransaction;
        $walletTransactionDebit->title = 'AgricLoan Application';
        $walletTransactionDebit->identifier = $agricLoanProfile->identifier;
        $walletTransactionDebit->user_id = Auth()->user()->id;
        $walletTransactionDebit->details = 'Subcription Purchase for agric loan application';
        $walletTransactionDebit->amount = $amount;
        $walletTransactionDebit->amount_paid = $amount;
        $walletTransactionDebit->category = 'Debit';
        $walletTransactionDebit->remarks = 'success';
        $walletTransactionDebit->transaction_type = 'AgricLoan';
        $walletTransactionDebit->balance =$findWallet->skill_coin_balance;

        $walletTransactionDebit->save();

        $agricLoanProfile->paid = 'Yes';

        $agricLoanProfile->save();

        Session::flash('success', 'Your agric loan subcription payment was successful');
        return redirect()->back();

    }

    public function destroy($id)
    {
        //
    }


   
}
