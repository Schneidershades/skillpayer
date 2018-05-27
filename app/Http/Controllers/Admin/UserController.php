<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Country;
use App\Package;
use App\Profile;
use App\WalletTransaction;
use App\PackageTransaction;
use App\Wallet;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function edit($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        if($profile == null){
            // if he doesent have just create
            $profile = new Profile;
            $profile->user_id =  $id;
            $profile->save();
        }

        $user = User::find($id);
        return view('admin.users.edit')
            ->with('user', $user)
            ->with('countries', Country::all());
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->avatar){
            // add the new photo
            $image = $request->file('avatar');
            $filename = $user->username.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/users/' . $filename;
            
            Image::make($image)->resize(490, 250)->save($location);

            $oldFilename = $user->profile->avatar;
            // add the new photo
            $user->profile->avatar = $location;
            // delete the old photo
            Storage::delete($oldFilename);
        }

        $user->profile->facebook = $request->facebook;
        $user->profile->twitter = $request->twitter;
        $user->profile->youtube = $request->youtube;
        $user->profile->googleplus = $request->googleplus;
        $user->profile->instagram = $request->instagram;
        $user->profile->pinterest = $request->pinterest;
        $user->profile->linkedin = $request->linkedin;
        $user->profile->vimeo = $request->vimeo;
        $user->profile->biography = $request->biography;
        $user->profile->mobile_number = $request->mobile_number;
        $user->profile->phone_number = $request->phone_number;
        $user->profile->website = $request->website;
        $user->profile->country = $request->country;
        $user->profile->state = $request->state;
        $user->profile->city = $request->city;
        $user->profile->postal_code = $request->postal_code;
        $user->profile->address = $request->address;
        
        
        $user->email = $request->email;
        $user->save();
        $user->profile->save();
        Session::flash('success', 'Account profile updated');
        return redirect()->back();
    }

    public function showChangePassword($id)
    {
        $user = User::find($id);

        return view('admin.users.changePassword')
            ->with('user', $user);
    }

    public function changePasswordUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'The user\'s password was successfully changed');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showWalletCredit($id)
    {
        $user = User::find($id);

        return view('admin.users.creditWallet')
            ->with('user', $user);
    }


    public function walletCreditUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $amountToCredit = $request->amount;
        $pvAmountToCredit = $request->sp_amount;

        if ($user === null) {
           Session::flash('error', 'Receiving user does not match users record');
           return redirect()->back();
        }

        // find wallet of who user is sending to
        $credit_coin = Wallet::where('user_id', $user->id)->first();
        
        // credit not
        if($request->has('amount') && $request->amount != null){
        
            $credit_coin->skill_coin_balance += $request->amount; 
            $credit_coin->save();
        
            $walletTransactionCredit = new WalletTransaction;
            $walletTransactionCredit->title = 'SKC Credit';
            $walletTransactionCredit->identifier = 'crdskc'.uniqid(true);
            $walletTransactionCredit->user_id = $user->id;
            $walletTransactionCredit->details = $request->amount .' |Credit SKC From Admin';
            $walletTransactionCredit->amount = $request->amount;
            $walletTransactionCredit->amount_paid = $request->amount;
            $walletTransactionCredit->category = 'Credit';
            $walletTransactionCredit->remarks = 'success';
            $walletTransactionCredit->transaction_type = 'transfer';
            $walletTransactionCredit->balance = $credit_coin->skill_coin_balance;

            $walletTransactionCredit->save();
        }

        if($request->has('sp_amount') && $request->sp_amount != null){

            $credit_coin->pv_balance += $request->sp_amount;
            $credit_coin->save();

            $walletTransactionPvCredit = new WalletTransaction;
            $walletTransactionPvCredit->title = 'SP Credit';
            $walletTransactionPvCredit->identifier = 'crdsp'.uniqid(true);
            $walletTransactionPvCredit->user_id = $user->id;
            $walletTransactionPvCredit->details =  $request->sp_amount .' | PV Credit From Admin';
            $walletTransactionPvCredit->amount = $request->sp_amount;
            $walletTransactionPvCredit->amount = $request->sp_amount;
            $walletTransactionPvCredit->category = 'Credit';
            $walletTransactionPvCredit->remarks = 'success';
            $walletTransactionPvCredit->transaction_type = 'transfer';
            $walletTransactionPvCredit->balance = $credit_coin->pv_balance;

            $walletTransactionPvCredit->save();
        }
        // save all
               

        Session::flash('success', 'Your credit transaction was successful');
        return redirect()->back();
    }

    public function showWalletDebit($id)
    {
        $user = User::find($id);

        return view('admin.users.debitWallet')
            ->with('user', $user);
    }


    public function walletDebitUpdate(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $amountToDebit = $request->amount;
        $pvAmountToDebit = $request->sp_amount;

        if ($user === null) {
           Session::flash('error', 'Receiving user does not match users record');
           return redirect()->back();
        }

        // find wallet of who user is sending to
        $debit_coin = Wallet::where('user_id', $user->id)->first();
        
        // credit not
        if($request->has('amount') && $request->amount!= null){
            $debit_coin->skill_coin_balance -= $request->amount;
            $debit_coin->save();

            $walletTransactionDebit = new WalletTransaction;
            $walletTransactionDebit->title = 'SKC Debit';
            $walletTransactionDebit->identifier = 'debskc'.uniqid(true);
            $walletTransactionDebit->user_id = $user->id;
            $walletTransactionDebit->details = $request->sp_amount .' | Debit Transaction From Admin';
            $walletTransactionDebit->amount = $request->amount;
            $walletTransactionDebit->amount_paid = $request->amount;
            $walletTransactionDebit->category = 'Debit';
            $walletTransactionDebit->remarks = 'success';
            $walletTransactionDebit->transaction_type = 'transfer';
            $walletTransactionDebit->balance = $debit_coin->skill_coin_balance;

            $walletTransactionDebit->save();
        }
        if($request->has('sp_amount') && $request->sp_amount!= null){
            $debit_coin->pv_balance -= $request->sp_amount;
            $debit_coin->save();

            $walletTransactionPvDebit = new WalletTransaction;
            $walletTransactionPvDebit->title = 'SP Debit';
            $walletTransactionPvDebit->user_id = $user->id;
            $walletTransactionPvDebit->identifier = 'debsp'.uniqid(true);
            $walletTransactionPvDebit->details = $request->sp_amount .' | Debit Transaction From Admin';
            $walletTransactionPvDebit->amount = $request->sp_amount;
            $walletTransactionPvDebit->amount_paid = $request->sp_amount;
            $walletTransactionPvDebit->category = 'Debit';
            $walletTransactionPvDebit->remarks = 'success';
            $walletTransactionPvDebit->transaction_type = 'transfer';
            $walletTransactionPvDebit->balance = $debit_coin->pv_balance;

            $walletTransactionPvDebit->save();
        }

        Session::flash('success', 'Your debit transaction was successful');
        return redirect()->back();
    }

    public function userTransactions($id)
    {
        $user = User::find($id);
        $transactions = WalletTransaction::where('user_id', $id)->get();

        return view('admin.users.userTransactions')
            ->with('transactions', $transactions)
            ->with('user', $user);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->has('password')){
            $user->password = bcrypt($request->name);

            $user->save();
            Session::flash('success', 'Password change successful');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function banUser(){

    }

    public function destroy($id)
    {
        //
    }
    
    public function packageTransactions()
    {
        $transactions = PackageTransaction::where('finished', true)->latest()->get();

        return view('admin.packageTransaction.index', [
            'transactions' => $transactions
        ]);
    }

    public function packageTransactionShow($transaction)
    {
        $transactions = WalletTransaction::where('identifier', $transaction)->get();

        return view('admin.packageTransaction.show', [
            'transactions' => $transactions,
        ]);
    }
    
    public function showChangePackage($id)
    {
        $user = User::find($id);

        return view('admin.users.changePackage')
            ->with('user', $user)
            ->with('packages', Package::all());
    }

    public function changePackageUpdate(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->has('package_id')){
            
            $user->package_id = $request->package_id;

            $user->save();
            Session::flash('success', 'User package plan changed successfully');
            return redirect()->back();
        }
    }
}
