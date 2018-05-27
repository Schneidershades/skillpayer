<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Auth;
use App\WebsiteApiBalance;
use App\WalletTransaction;
use App\SmsTextTransaction;
use App\Wallet;
use App\Models\Products\ServiceSetting;
// use App\Models\Products\SMSTransaction;

class SMSController extends Controller
{
    public function processSMS(Request $request)
    {
    	//  the recepient is counting after the commas so it tends to send 
    	$countAfterCommas = substr_count($request->recipient, ",");
    	$total = $countAfterCommas + 1;

    	$amount  = $total * 3.00;

    	$title = 'SMS'. " to " . $total ." Numbers for N".$amount.'.00' ;

    	// check users balance
        if(Auth::user()->wallet->skill_coin_balance < $amount){
            return redirect()->back()->with('error', 'you have an insufficent balance to make transactions');
        }     

        $api_provider = ServiceSetting::where('code', 'sms')->where('type', 'sms')->first();

        if ($api_provider === NULL){
            return redirect()->back()->with('error', 'Service is unavailable at the moment. Please Try again Later');
        }
        if ($api_provider->api_provider == "skillpyersms.com"){

            $response = $this->sendSmsFromApi($request);

            if ($response['msg_id'] != NULL){

            	// since no commission just deduct
                $amount_paid = $amount;

                // find the user
                $find_wallet = Wallet::where('user_id', Auth::id())->first();

                // deduct wallet
                $find_wallet->skill_coin_balance -=  $amount_paid;

          //       foreach ($numbers as $number) {
		        //      $check_number = PhoneBook::where('number', $number)->first();
		        //     if($check_number === null){
		        //         $new_number = new Tag;
		        //         $new_number->number = $number;
		        //         $new_number->user_id = Auth::id();
		        //         $new_number->save();
		        //     }else{
		        //         // dd('good');
		        //         $advert->tags()->attach($check_tag->id);
		        //     }
		        // }
           

                $transaction = new SmsTextTransaction;

                $transaction->title = $title;
                $transaction->receiver = $request->recipient;
                $transaction->network = 'any';
                $transaction->amount = $amount;
                $transaction->amount_paid = $amount_paid;
                $transaction->commission_applied = 0;
                $transaction->transaction_id = $response['msg_id'];
                $transaction->email = 'NULL';
                $transaction->phone = 'NULL';
                $transaction->vtu_type = 'SMS';
                $transaction->vtu_code = 'SMS';
                $transaction->api_used = $api_provider->api_provider;
                $transaction->api_response = $response['msg_id'];
                $transaction->status = 'Fulfilled';
                $transaction->user_id = Auth::id();

                $transaction->save();
                $find_wallet->save();

                $walletReport = new WalletTransaction;

                $walletReport->title = $title;
                $walletReport->identifier = $transaction->identifier;
                $walletReport->user_id = Auth::id();
                $walletReport->details = $title;
                $walletReport->amount = $amount_paid;
                $walletReport->amount_paid = $amount_paid;
                $walletReport->category = 'SMS';
                $walletReport->remarks = 'successful';
                $walletReport->transaction_type = 'Debit';
                $walletReport->balance = $find_wallet->skill_coin_balance;

                $walletReport->save();
                
                if($amount_paid >= 1000){
                    $this->getReward($amount_paid, $transaction->identifier);
                }

                return redirect()->back()->with('success', 'Your transaction was successful');
                
            }else{
                $transaction = new SMSTextingTransaction;
                $transaction->title = $title;
                $transaction->receiver = $request->recipient;
                $transaction->network = 'any';
                $transaction->amount = $amount;
                $transaction->amount_paid = $amount_paid;
                $transaction->commission_applied = 0;
                $transaction->api_response = $response['msg_id'];
                $transaction->email = 'NULL';
                $transaction->phone = "NULL";
                $transaction->vtu_type = 'SMS';
                $transaction->vtu_code = 'SMS';
                $transaction->api_used = $api_provider->api_provider;
                $transaction->api_response = $response['msg_id'];
                $transaction->status = 'Failed';
                $transaction->user_id = Auth::id();
                
                $transaction->save();
                return redirect()->back()->with('error', 'Sorry cannot complete transaction at the moment. Please try again later!!');
            }
        }

    }

    public function sendSmsFromApi(Request $request)
    {
    	// http://smsc.skillpyersms.com/API/WebSMS/Http/v1.0a/index.php?username=skillpyersms.com&password=Your+Password&sender=my+senderID&to=my+recipient&message=Hello+Test+Message&reqid=1&format={json|text}&route_id=route+id&callback=Any+Callback+URL&unique=0&sendondate=17-02-2018T04:52:25

    	// {"msg_id":"67062-180217-07053702-19721156135-63054","message":"testing+testing","msgType":"TEXT","sendondate":"2018-02-17 07:05:37","to_number":"07037495705"}

        $client = new Client();
        $response = $client->request('GET', 'http://smsc.skillpyersms.com/API/WebSMS/Http/v1.0a/index.php', [
            'query' => [
                'username' => 'skillpyersms.com',
                'password' => '1956',
                'sender' => $request->sender,
                'to' => $request->recipient,
                'message' => $request->message,
                'reqid' => 1,
                'format' => 'json',
                'route_id' => '',
                'callback' => '',
                'unique' => '',
                'sendondate' => '',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        return $response;
    }
    
    public function getReward($amount_paid, $identifier)
    {   
        
        if(Auth::user()->package_id == 5){
            $pvCredit = 5;
        }
        if(Auth::user()->package_id == 4){
            $pvCredit = 4;
        }
        if(Auth::user()->package_id == 3){
            $pvCredit = 3;
        }
        if(Auth::user()->package_id == 2){
            $pvCredit = 2;
        }
        if(Auth::user()->package_id == 1){
            $pvCredit = 1;
        }

        if ($pvCredit > 0){
            $find_wallet  = Wallet::where('user_id', Auth::id())->first();

            $find_wallet->pv_balance += $pvCredit;

            $find_wallet->save();

            $walletReport = new WalletTransaction;

            $walletReport->title = 'SP Bonus Reward';
            $walletReport->identifier = $identifier;
            $walletReport->user_id = Auth::id();
            $walletReport->details = 'Sp Bonus Reward for a Transaction above 1000SKC';
            $walletReport->amount = $pvCredit;
            $walletReport->amount_paid = $amount_paid;
            $walletReport->category = 'SMS';
            $walletReport->remarks = 'Successful';
            $walletReport->transaction_type = 'Credit';
            $walletReport->balance = $find_wallet->pv_balance;

            $walletReport->save();
            
        }
        
    }
}
