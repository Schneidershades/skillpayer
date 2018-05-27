<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Transaction;
use App\WalletTransaction;
use Session;
use Auth;
use App\WalletFund;
use App\Wallet;


class PaymentController extends Controller
{
    public function redirectToGateway(Request $request)
    {
        // Paystack receives the amount in Kobo, so we multiply by 100 to get the Naira equivalent

        $initialPay = $request->amount;

        $commission = $request->amount * 0.02;

        $amountToPayFinally = $request->amount + $commission;

        $request->amount = $amountToPayFinally * 100;



        $walletFunding = new WalletTransaction;

        $walletFunding->title = 'Wallet Fund';
        $walletFunding->identifier = $request->transaction_ref;
        $walletFunding->user_id = Auth::id();
        $walletFunding->details = 'processing';
        $walletFunding->amount_paid = $initialPay;
        $walletFunding->amount = $initialPay;
        $walletFunding->category = 'Wallet TopUp';
        $walletFunding->remarks = 'Pending';
        $walletFunding->transaction_type = 'Credit';

        $walletFunding->save();

        if ($request->type == 'card'){
            $this->payWithCard($request);
        }

        return Paystack::getAuthorizationUrl()->redirectNow();
    }


    public function handleGatewayCallback(){
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['data']['status']){

            $reference = $paymentDetails['data']['metadata']['transaction_id'];
            //Paystack returns the amount in Kobo, so we divide by 100 to convert to Naira
            $amountFromPaystack = $paymentDetails['data']['amount'] / 100;
            $amountCommission = $amountFromPaystack * 0.0200;

            $walletSuccess = WalletTransaction::where('identifier', $reference)->first();
            $walletSuccess->remarks = 'Successful';
            $walletSuccess->details = 'Successful Funding';

            $find_wallet = Wallet::where('user_id', Auth::id())->first();
            $find_wallet->skill_coin_balance +=  $walletSuccess->amount;

            $walletSuccess->balance = $find_wallet->skill_coin_balance;

            $walletSuccess->save();
            $find_wallet->save();

            return redirect()->route('home')->with('success', $paymentDetails['message']);
        }else{

            return redirect()->route('home')->with('error', $paymentDetails['message']);
        }

    }


    /**
     * Obtain Paystack payment information
     * This handles all the callback for any payment
     * that will go through Paystack.
     * If the payment is of the type 'funding', fund the users account
     * through the fundWallet method.
     */

    public function paymentCallBack(){

        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['status'] == true && $paymentDetails['data']['metadata']['custom_field']['type'] == 'funding'){

            return $this->fundWallet();
        }

        if ($paymentDetails['status'] == true && $paymentDetails['data']['metadata']['custom_field']['type'] == 'card'){

            return $this->payWithCardCallback();
        }
        else{
            dd($paymentDetails['data']['metadata']['custom_field']['type']);
        }


    }

    /**
     * Fund User's Wallet
     * Get the Authenticated user, get how much he payed on PayStack
     * Fund his account with the equivalent amount.
     *
     */
    public function fundWallet(){

        $user = Auth::user();
        $paymentDetails = Paystack::getPaymentData();

        //Paystack returns the amount in Kobo, so we divide by 100 to convert to Naira
        $amountFromPaystack = $paymentDetails['data']['amount'] / 100;

        $amountCommission = $amountFromPaystack * 0.02;

        $amountToCredit = $amount - $amountCommission;

        $wallet = $user->wallet()->first();

        $current_balance = $wallet->balance;

        $new_balance = $current_balance + $amountToCredit;

        $wallet->balance = $new_balance;

        // Also save it in the wallet transaction history
        $wallet_transaction = new WalletTransaction();

        $wallet_transaction->type = 'Credit';
        $wallet_transaction->amount = $amountToCredit;

        $wallet->walletTransaction()->save($wallet_transaction);
        $wallet->save();

        return redirect()->route('home');
    }

    
    /**
     * Allow users to pay on Pickup.
     * Save the user's order.
     * Register the transaction with a Reference Number.
     * Mark the order as Unpaid.
     */
    public function payOnPickup(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|max:195',
//            'phone' => 'required',
//            'email' => 'email',
//            'address' => 'required'
//
//        ]);

        $user = Auth::user();
        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->amount = $request->amount;
        $order->payment_type = 'On Pickup';
        $order->reference = str_random(6);
        $order->status = 'Unpaid';
        $order->pickup_date = $request->date;
        $order->pickup_time = $request->time;
        $order->cart = serialize(Cart::content());

        $user->orders()->save($order);
        Session::flash('success', 'Order Successfully placed!');

        return redirect()->route('home');


    }

    public function payWithCard(Request $request){

        $this->validate($request, [
            'name' => 'required|max:195',
            'phone' => 'required',
            'email' => 'email',
            'address' => 'required'

        ]);

        $user = Auth::user();

        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->amount = $request->amount;
        $order->payment_type = 'Card';
        $order->reference = str_random(6);
        $order->cart = serialize(Cart::content());
        $order->status = 'Unpaid';

        $user->orders()->save($order);

        /*
         * Add the order id and transaction type to the information going to paystack.
         * This will enable us know the product that was payed for when the payment calls back.
         *
         * */

        request()->metadata = json_encode(['custom_field' => ['order_id' => $order->id, 'type' => 'card']]);

        return $this;

    }

    public function payWithCardCallback(){

        $paymentDetails = Paystack::getPaymentData();
        dd($paymentDetails);

        // if ($paymentDetails['data']['status'] == 'success'){

        //     $order = Order::find($paymentDetails['data']['metadata']['custom_field']['order_id']);



        //     $order->reference = request()->trxref;
        //     $order->status = 'paid';

        //     $order->save();

        //     Session::flash('success', 'Transaction Successful. Your Reference ID is: ' . request()->trxref);

        //     return redirect()->route('home')->with('transaction_ref', request()->trxref);

        // }else{

        //     dd('payment failed');
        // }

        // return $this;
    }

}
