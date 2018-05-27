<?php
namespace App\Http;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Wallet;
use Auth;
use App\WalletTransaction;
use App\Models\Products\AirtimeTransaction;
use App\Models\Products\PowerTransaction;
use App\Models\Products\DataTransaction;
use Session;

class Helpers {

	public static function vendAirtimeIrecharge($network, $amount, $number, $reference_id){

		$vendor_code = "171030B788";
        
        $live_public_key = "4a10b9dc2bf4e97261a8d814204b30c5";
        $live_private_key = "a01d68c4ba6b52f5200f0e31ebad0e732778151f4f32322c999debd31f2f55668c2196b3a520aaf6d80d8f99b2b99d0a17be0e522738e40d25ef6697aeb60d84";

        $test_public_key = "cc9567e23474f697e023aba9d3e93476";
        $test_private_key = "b30663a42f519a9715da3a8a8b5b4c52b5aae28bcec416d64de3350193aa642021356bf7805502bf020341405bbb8956b8d0b03a200e177ed21a517a77cbd4ef";

        $sending_string = $vendor_code."|".$reference_id."|".$number."|".$network."|".$amount."|".$live_public_key;
        
        //$hash = hash('sha512', $sending_string);
        $hash = hash_hmac("sha1", $sending_string, $live_private_key);

        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_live/v2/vend_airtime.php', [
            'query' => [
                'vendor_code' => $vendor_code,
                'vtu_network' => $network,
                'vtu_amount' => $amount,
                'vtu_number' => $number,
                'vtu_email' => 'housingevangelist@gmail.com',
                'reference_id' => $reference_id,
                'vtu_email' => '',
                'hash' => $hash,
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        return $response;
	}

	public static function vendVtpassFlexi($serviceID, $amount, $number,  $reference_id)
    {
        $username = "housingevangelist@gmail.com"; 
        $password = "GodPassdem1%."; 
        $host = 'https://vtpass.com/api/payflexi';

        $data = array(
            'serviceID'=> strtolower($serviceID), //integer e.g mtn,airtel
            'amount' =>  $amount, // integer
            'phone' => $number, //integer
            'request_id' => $reference_id // unique for every transaction from your platform
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_USERPWD => $username.":" .$password,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
        ));

        $response = json_decode(curl_exec($curl), true);

        return $response;
    }

    public static function vendVtpassFlexiPower($reference_id, $serviceID, $billersCode=null, $variation_code=null, $amount=null, $phone)
    {
        $username = "housingevangelist@gmail.com"; 
        $password = "GodPassdem1%."; 
        $host = 'https://vtpass.com/api/payflexi';

        $data = array(
            'serviceID'=> $serviceID, //integer e.g gotv,dstv,eko-electric,abuja-electric
            'billersCode'=> $billersCode, // e.g smartcardNumber, meterNumber,
            'variation_code'=> $variation_code, // e.g dstv1, dstv2,prepaid,(optional for somes services)
            'amount' =>  $amount, // integer (optional for somes services)
            'phone' => $phone, //integer
            'request_id' => $reference_id // unique for every transaction from your platform
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_USERPWD => $username.":" .$password,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
        ));

        $response = json_decode(curl_exec($curl), true);

        return $response;
    }


    public static function vendVtpassFix($request, $reference_id, $serviceID, $billersCode=null, $variation_code=null, $amount=null, $phone)
    {
    	$username = "housingevangelist@gmail.com";  
		$password = "GodPassdem1%."; 
		$host = 'http://vtpass.com/api/payfix';

		$data = array(
		  	'serviceID'=> $serviceID, //integer e.g gotv,dstv,eko-electric,abuja-electric
		  	'billersCode'=> $billersCode, // e.g smartcardNumber, meterNumber,
		  	'variation_code'=> $variation_code, // e.g dstv1, dstv2,prepaid,(optional for somes services)
		  	'amount' =>  $amount, // integer (optional for somes services)
		  	'phone' => $phone, //integer
		  	'request_id' => $reference_id // unique for every transaction from your platform
		);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => $host,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_USERPWD => $username.":" .$password,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data,
		));

		$response = json_decode(curl_exec($curl), true);
        return $response;
		
    }

    public static function vendVtpassVerifyMerchant($request, $reference_id, $serviceID, $billersCode)
    {
    	$username = "housingevangelist@gmail.com";  
		$password = "GodPassdem1%."; 
		$host = 'https://vtpass.com/api/merchant-verify';
		$data = array(
		  	'serviceID'=> $serviceID, //integer e.g gotv,dstv,eko-electric,abuja-electric
		  	'billersCode'=> $billersCode, // e.g smartcardNumber, meterNumber,
		  	'request_id' => $reference_id // unique for every transaction from your platform
		);
		$curl       = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => $host,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_USERPWD => $username.":" .$password,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data,
		));

		$response = json_decode(curl_exec($curl), true);
        return $response;
		
    }

	public static function irechargeDataApi(Request $request, $reference_id){
		$vendor_code = "171030B788";
    	
    	$live_public_key = "4a10b9dc2bf4e97261a8d814204b30c5";
        $live_private_key = "a01d68c4ba6b52f5200f0e31ebad0e732778151f4f32322c999debd31f2f55668c2196b3a520aaf6d80d8f99b2b99d0a17be0e522738e40d25ef6697aeb60d84";
    
        $test_public_key = "cc9567e23474f697e023aba9d3e93476";
        $test_private_key = "b30663a42f519a9715da3a8a8b5b4c52b5aae28bcec416d64de3350193aa642021356bf7805502bf020341405bbb8956b8d0b03a200e177ed21a517a77cbd4ef";
        
        
		$sending_string = $vendor_code."|".$reference_id."|".$request->data_number."|".$request->data_network."|".$request->data_plan."|".$test_key;
		//$hash = hash('sha512', $sending_string);
		$hash = hash_hmac("sha1", $sending_string, $live_public_key);

        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/vend_data.php', [
            'query' => [
                'vendor_code' => $vendor_code,
                'vtu_network' => $request->data_network,
                'reference_id' => $reference_id,
                'vtu_number' => $request->data_number,
                'vtu_data' => $request->data_plan,
                'vtu_email' => '',
                'hash' => $hash,
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        return $response;
	}

	public static function getReward($amount_paid, $identifier, $rechargeType){

		// recharge type is for checking whether its airtime data tv or power
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
            $walletReport->details = 'SP Bonus Reward for a Transaction above 1000SKC';
            $walletReport->amount = $pvCredit;
            $walletReport->amount_paid = $amount_paid;
            $walletReport->category = $rechargeType;
            $walletReport->remarks = 'Successful';
            $walletReport->transaction_type = 'Credit';
            $walletReport->balance = $find_wallet->pv_balance;

            $walletReport->save();
            
        }
	}

	public static function processAirtimeTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $network, $api_used, $api_response, $status)
	{
	 	// get the commission out by multiplying with the amount 
        $amount_to_deduct = $request->airtime_amount * $api_provider->percentage_commission;
        
        $amount_paid = $request->airtime_amount - $amount_to_deduct;
        // find the user
        $find_wallet = Wallet::where('user_id', Auth::id())->first();

        // deduct wallet
        $find_wallet->skill_coin_balance -=  $amount_paid;

		$transaction = new AirtimeTransaction;

        $transaction->title = $title;
        $transaction->receiver = $request->airtime_number;
        $transaction->network = $request->airtime_network;
        $transaction->amount = $request->airtime_amount;
        $transaction->amount_paid = $amount_paid;
        $transaction->commission_applied =  $api_provider->percentage_commission;
        $transaction->transaction_id = $reference_id;
        $transaction->email = $request->airtime_email;
        $transaction->phone = $request->airtime_number;
        $transaction->vtu_type = 'Airtime';
        $transaction->vtu_code = $network;
        $transaction->api_used = $api_used;
        $transaction->api_response = $api_response;
        $transaction->status = $status;
        $transaction->user_id = Auth::id();

        $transaction->save();

        if ($status  == 'Fulfilled'){

        	$find_wallet->save();
	        $walletReport = new WalletTransaction;

	        $walletReport->title = 'AirTime Purchase';
	        $walletReport->identifier = $transaction->identifier;
	        $walletReport->user_id = Auth::id();
	        $walletReport->details = $title;
	        $walletReport->amount = $request->airtime_amount;
	        $walletReport->amount_paid = $amount_paid;
	        $walletReport->category = 'Airtime';
	        $walletReport->remarks = 'successful';
	        $walletReport->transaction_type = 'Debit';
	        $walletReport->balance = $find_wallet->skill_coin_balance;

	        $walletReport->save();

	        if($amount_paid >= 1000){
	            Helpers::getReward($amount_paid, $transaction->identifier, 'Airtime');
	        }
        }
        
	}

	public static function vendAirtimeApiTry()
    {
        $vendor_code = "171030B788";
        
        $reference_id = mt_rand(1000000, 2222222);
        
        $live_public_key = "4a10b9dc2bf4e97261a8d814204b30c5";
        $live_private_key = "a01d68c4ba6b52f5200f0e31ebad0e732778151f4f32322c999debd31f2f55668c2196b3a520aaf6d80d8f99b2b99d0a17be0e522738e40d25ef6697aeb60d84";

        $test_public_key = "cc9567e23474f697e023aba9d3e93476";
        $test_private_key = "b30663a42f519a9715da3a8a8b5b4c52b5aae28bcec416d64de3350193aa642021356bf7805502bf020341405bbb8956b8d0b03a200e177ed21a517a77cbd4ef";

        $sending_string = '171030B788'."|".$reference_id."|".'07037495705'."|".'MTN'."|".'50'."|".$live_public_key;
        
        //$hash = hash('sha512', $sending_string);
        $hash = hash_hmac("sha1", $sending_string, $live_private_key);

        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_live/v2/vend_airtime.php', [
            'query' => [
                'vendor_code' => '171030B788',
                'vtu_network' => 'MTN',
                'vtu_amount' => '50',
                'vtu_number' => '07037495705',
                'reference_id' => $reference_id,
                'vtu_email' => '',
                'hash' => $hash,
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        dd($response);
    }


    public static function processDataTransactionAndDeductWallet($title, $data_amount, $request, $api_provider, $reference_id, $network, $api_used, $api_response, $status)
    {
        $amount_to_deduct = $data_amount * $api_provider->percentage_commission;

        $amount_paid = $data_amount - $amount_to_deduct;

        // find the user
        $find_wallet = Wallet::where('user_id', Auth::id())->first();

        // deduct wallet
        $find_wallet->skill_coin_balance -=  $amount_paid;

        $transaction = new DataTransaction;

        $transaction->title = $title;
        $transaction->receiver = $request->data_number;
        $transaction->network = $request->data_network;
        $transaction->amount = $data_amount;
        $transaction->amount_paid = $amount_paid;
        $transaction->commission_applied = $api_provider->percentage_commission;
        $transaction->transaction_id = $reference_id;
        $transaction->email = $request->data_email;
        $transaction->phone = $request->data_number;
        $transaction->vtu_type = 'Data';
        $transaction->vtu_code = $request->data_network;
        $transaction->api_used = $api_used;
        $transaction->api_response = $api_response;
        $transaction->status = $status;
        $transaction->user_id = Auth::id();

        $transaction->save();

        if ($status  == 'Fulfilled'){
	        $find_wallet->save();

	        $walletReport = new WalletTransaction;

	        $walletReport->title = 'Internet Data Purchase';
	        $walletReport->user_id = Auth::id();
	        $walletReport->identifier = $transaction->identifier;
	        $walletReport->details = $title;
	        $walletReport->amount = $check_code->price;
	        $walletReport->amount_paid = $amount_paid;
	        $walletReport->category = 'Data';
	        $walletReport->remarks = 'successful';
	        $walletReport->transaction_type = 'Debit';
	        $walletReport->balance = $find_wallet->skill_coin_balance;

	        $walletReport->save();

	        if($amount_paid >= 1000){
	            Helpers::getReward($amount_paid, $transaction->identifier, 'Data');
	        }
	    }
        
    }


    public static function processPowerTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $api_used, $api_response, $status, $response){
    	// get the commission out by multiplying with the amount 
            $amount_to_deduct = $request->power_amount * $api_provider->percentage_commission;

            $amount_paid = $request->power_amount + $api_provider->service_charge - $amount_to_deduct;

            // find the user
            $find_wallet = Wallet::where('user_id', Auth::id())->first();

            // deduct wallet
            $find_wallet->skill_coin_balance -=  $amount_paid;

            $transaction = new PowerTransaction;

            $transaction->title = $title;
            $transaction->receiver = $request->power_meter;
            $transaction->disco = $request->power_disco;
            $transaction->amount = $request->power_amount;
            $transaction->amount_paid = $amount_paid;
            $transaction->commission_applied = $api_provider->percentage_commission;
            $transaction->transaction_id = $reference_id;
            $transaction->email = $request->power_email;
            $transaction->phone = $request->power_number;
            $transaction->power_type = 'Power';
            $transaction->power_code = $request->power_disco;
            $transaction->api_used = $api_used;
            $transaction->api_response = $api_response;
            $transaction->status = $status;
            $transaction->user_id = Auth::id();

            $transaction->save();

            if($status  == 'Fulfilled'){
            	$find_wallet->save();

	            $walletReport = new WalletTransaction;

	            $walletReport->title = 'Power Purchase';
                $walletReport->identifier = $transaction->identifier;
                $walletReport->user_id = Auth::id();
                $walletReport->details = 'Successful token purchase '.$response['meter_token']. ' : Units '.$response['units'];
                $walletReport->amount = $request->power_amount;
                $walletReport->amount_paid = $amount_paid;
                $walletReport->category = 'Power Recharge';
                $walletReport->remarks = 'Successful';
                $walletReport->transaction_type = 'Debit';
                $walletReport->balance = Auth::user()->wallet->skill_coin_balance;
                
                $walletReport->save();

	            if($amount_paid >= 1000){
		            Helpers::getReward($amount_paid, $transaction->identifier, 'Power');
		        }
			}

           
    }

    public static function getMeterInfo($request, $reference_id){
		$vendor_code = "171030B788";

      	$live_public_key = "4a10b9dc2bf4e97261a8d814204b30c5";
      	$live_private_key = "a01d68c4ba6b52f5200f0e31ebad0e732778151f4f32322c999debd31f2f55668c2196b3a520aaf6d80d8f99b2b99d0a17be0e522738e40d25ef6697aeb60d84";

      	$test_public_key = "cc9567e23474f697e023aba9d3e93476";
      	$test_private_key = "b30663a42f519a9715da3a8a8b5b4c52b5aae28bcec416d64de3350193aa642021356bf7805502bf020341405bbb8956b8d0b03a200e177ed21a517a77cbd4ef";

    	$sending_string = $vendor_code."|".$reference_id."|".$request->power_meter."|".$request->power_disco."|".$live_public_key;

    	$hash = hash_hmac("sha1", $sending_string, $live_private_key);

        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_live/v2/get_meter_info.php', [
            'query' => [
                'vendor_code' => $vendor_code,
                'hash' => $hash,
                'reference_id' => $reference_id,
                'response_format' => 'json',
                'disco' => $request->power_disco,
                'meter' => $request->power_meter,
            ],
        ]);

        $response = json_decode($response->getBody(), true);
       
        return $response;
	}
	
	
	public static function vendPowerIrechargeApi($request, $response, $reference_id)
	{
	    $vendor_code = "171030B788";

      	$live_public_key = "4a10b9dc2bf4e97261a8d814204b30c5";
      	$live_private_key = "a01d68c4ba6b52f5200f0e31ebad0e732778151f4f32322c999debd31f2f55668c2196b3a520aaf6d80d8f99b2b99d0a17be0e522738e40d25ef6697aeb60d84";

      	$test_public_key = "cc9567e23474f697e023aba9d3e93476";
      	$test_private_key = "b30663a42f519a9715da3a8a8b5b4c52b5aae28bcec416d64de3350193aa642021356bf7805502bf020341405bbb8956b8d0b03a200e177ed21a517a77cbd4ef";
      	
        $sending_string = $vendor_code."|".$reference_id."|".$request->power_meter."|".$request->power_disco."|".$request->power_amount."|".$response['access_token']."|".$live_public_key;

        $hash = hash_hmac("sha1", $sending_string, $live_private_key);

        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_live/v2/vend_power.php', [
            'query' => [
                'vendor_code' => $vendor_code,
                'hash' => $hash,
                'reference_id' => $reference_id,
                'response_format' => 'json',
                'access_token' => $response['access_token'],
                'amount' => $request->power_amount,
                'disco' => $request->power_disco,
                'meter' => $request->power_meter,
                'email' => 'housingevangelist@gmail.com',
                'phone' => '09055555133',
            ]
        ]);
        
        $response = json_decode($response->getBody(), true);
        
        return $response;
	}


	public static function getSmartcardInfo(Request $request, $reference_id)
    {
    	$vendor_code = "171030B788";
    	
    	$live_public_key = "4a10b9dc2bf4e97261a8d814204b30c5";
        $live_private_key = "a01d68c4ba6b52f5200f0e31ebad0e732778151f4f32322c999debd31f2f55668c2196b3a520aaf6d80d8f99b2b99d0a17be0e522738e40d25ef6697aeb60d84";
    
        $test_public_key = "cc9567e23474f697e023aba9d3e93476";
        $test_private_key = "b30663a42f519a9715da3a8a8b5b4c52b5aae28bcec416d64de3350193aa642021356bf7805502bf020341405bbb8956b8d0b03a200e177ed21a517a77cbd4ef";

		// $sending_string = $vendor_code."|".$reference_id."|".$request->tv_network."|".$request->smartcard_number."|".$request->service_id."|".$public_key;
		
		 
		$sending_string = $vendor_code."|".$reference_id."|".$request->tv_network."|".$request->tv_smartcard."|".$request->tv_code."|".$live_public_key;
		
		$hash = hash_hmac("sha1", $sending_string, $live_private_key);

        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_live/v2/get_smartcard_info.php', [
            'query' => [
                'vendor_code' => $vendor_code,
                'hash' => $hash,
                'reference_id' => $reference_id,
                'response_format' => 'json',
                'tv_network' => $request->tv_network,
                'service_code' => $request->tv_code,
                'smartcard_number' => $request->tv_smartcard,
                'startimes_amount' => $request->startimes_amount,
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        if($response['status'] == 00){
        	$reference_id2 = mt_rand(100000000000, 999999999999);

	       
             $sending_string = $vendor_code."|".$reference_id2."|".$request->tv_smartcard."|".$request->tv_network."|".$request->tv_code."|".$response['access_token']."|".$live_public_key;
			
            
			$hash = hash_hmac("sha1", $sending_string, $live_private_key);

	        $client = new Client();
	        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_live/v2/vend_tv.php', [
	            'query' => [
	                'vendor_code' => $vendor_code,
	                'hash' => $hash,
	                'reference_id' => $reference_id2,
	                'response_format' => 'json',
	                'smartcard_number' => $request->tv_smartcard,
	                'access_token' => $response['access_token'],
	                'service_code' => $request->tv_code,
	                'tv_network' => $request->tv_network,
	                'email' => 'housingevangelist@gmail.com',
	                'phone' => '08043784734',
	            ],
	        ]);

	        $response = json_decode($response->getBody(), true);

	        return $response;
        }
    }

    public static function processDigitalTvAndDeductWallet($title, $tv_amount, $request, $api_provider, $reference_id, $network, $api_used, $api_response, $status)
    {
    	// get the commission out by multiplying with the amount 
        $amount_to_deduct = $tv_amount * $api_provider->percentage_commission;

        $amount_paid = $check_code->price +  $api_provider->service_charge - $amount_to_deduct ;

        // find the user
        $find_wallet = Wallet::where('user_id', Auth::id())->first();

        // deduct wallet
        $find_wallet->skill_coin_balance -=  $amount_paid;

        $transaction = new DigitalTvTransaction;

        $transaction->title = $title;
        $transaction->receiver = $request->tv_number;
        $transaction->tv_network = $request->tv_network;
        $transaction->amount = $tv_amount;
        $transaction->amount_paid = $amount_paid;
        $transaction->commission_applied = $api_provider->percentage_commission;
        $transaction->transaction_id = $reference_id;
        $transaction->email = $request->tv_email;
        $transaction->phone = $request->tv_number;
        $transaction->tv_type = $request->tv_network;
        $transaction->tv_code = $request->tv_code;
        $transaction->api_used = $api_used;
        $transaction->api_response = $api_response;
        $transaction->status = $status;
        $transaction->user_id = Auth::id();

        $transaction->save();

        if($status == 'Fulfilled'){

        	$find_wallet->save();

	        $walletReport = new WalletTransaction;

	        $walletReport->title = 'Digital Tv Plan Purchase';
	        $walletReport->identifier = $transaction->identifier;
	        $walletReport->user_id = Auth::id();
	        $walletReport->details = $title;
	        $walletReport->amount = $check_code->price;
	        $walletReport->amount_paid = $amount_paid;
	        $walletReport->category = 'TV';
	        $walletReport->remarks = 'successful';
	        $walletReport->transaction_type = 'Debit';
	        $walletReport->balance = $find_wallet->skill_coin_balance;

	        $walletReport->save();
	        
	        if($amount_paid >= 1000){
	            Helpers::getReward($amount_paid, $transaction->identifier, 'Digital Tv Plan');
	        }
        }
    }

    public static function activityLog($user, $action){
    	// this user did this at time and was successful
    }
}