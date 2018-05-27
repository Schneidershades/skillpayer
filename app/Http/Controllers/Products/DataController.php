<?php

namespace App\Http\Controllers\Products;

use App\Http\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Auth;
use App\WebsiteApiBalance;
use App\WalletTransaction;
use App\Wallet;
use App\Models\Products\ServiceSetting;
use App\Models\Products\DataTransaction;
use App\Models\Api\Provider\Irecharge\IrechargeDataService;
use App\Models\Api\Provider\Vtpass\VtpassApiCategory;
use App\Models\Api\Provider\Vtpass\VtpassApiService;
use App\Models\Api\Provider\Vtpass\VtpassApiServiceVariation;

class DataController extends Controller
{
    public function data(Request $request)
    {
        if ($request->data_network == "MTN"){
            $network = "MTN";
        }

        if ($request->data_network == "Glo"){
            $network = "Glo";
        }

        if ($request->data_network == "Airtel"){
            $network = "Airtel"; 
        }

        if ($request->data_network == "9Mobile"){
            $network = "Etisalat" ;
        }

        if ($request->data_network == "Smile"){
            $network = "Smile";
        }

        if ($request->data_network == "Spectranet"){
            $network = "Spectranet";
        }


        // check api provider
        $api_provider = ServiceSetting::where('code', $request->data_network)->where('type', 'Data')->first();
        if ($api_provider === NULL){
            return redirect()->back()->with('error', 'Service is unavailable at the moment. Please Try again Later');
        }

        // if($request->data_plan){
        //     $check_code = IrechargeDataService::where('code', $request->data_plan)->first();
        //     if ($check_code === NULL){
        //         return redirect()->back()->with('error', 'Please Select a data plan');
        //     }
        // }

        if ($api_provider->api_provider == "irecharge" && $request->data_plan){
            $check_code = IrechargeDataService::where('code', $request->data_plan)->first();
            if ($check_code === NULL){
                return redirect()->back()->with('error', 'Please Select a data plan');
            }
        }

        if ($api_provider->api_provider == "vtpass" && $request->data_plan){
            $check_code = VtpassApiServiceVariation::where('code', $request->data_plan)->first();
            if ($check_code === NULL){
                return redirect()->back()->with('error', 'Please Select a data plan');
            }
        }

        // check users balance
        if(Auth::user()->wallet->skill_coin_balance < $check_code->price){
            return redirect()->back()->with('error', 'you have insufficent balance to make transactions');
        }  

        $reference_id = mt_rand(100000000000, 999999999999);

        $title = $request->data_network .' '.$check_code->title . " to " .$request->data_number;

        if ($api_provider->api_provider == "irecharge"){

            $response = $this->processData($request, $reference_id);

            if ($response['status']){
                if($response['status']  == 00){
                    $apiResponse = true;
                    $provider = "irecharge";
                    $code = $response['status'];
                    $message = $response['message'];
                    $storeMessage = $code.' : '.$message ;
                }else{
                    $apiResponse = false;
                    $provider = "irecharge";
                    $code = $response['status'];
                    $message = $response['message'];
                    $storeMessage = $code.' : '.$message ;
                }
            }
        }

        if ($api_provider->api_provider == "vtpass"){


            if (strtolower($request->data_network) == strtolower('mtn')){
                $network = "mtn-data";
            }

            if (strtolower($request->data_network) == strtolower('Glo')){
                $network = "glo-data";
            }

            if (strtolower($request->data_network) == strtolower("Airtel")){
                $network = "airtel-data"; 
            }

            if (strtolower($request->data_network) == strtolower("9Mobile")){
                $network = "etisalat-data" ;
            }

            $isAvailable = VtpassApiService::where(strtolower('service_id'), strtolower($network))->first();

            if($isAvailable == null){
                return redirect()->back()->with('error', 'Cannot make transaction at the moment. Try again in few minutes');
            }

            $response = $this->vendVtpassFix($request, $reference_id, $network, $billersCode, $check_code->code, $check_code->price, $request->data_number);

            if ($response['status']){
                if($response['status']  == 00){
                    $apiResponse = true;
                    $provider = "irecharge";
                    $code = $response['status'];
                    $message = $response['message'];
                    $storeMessage = $code.' : '.$message ;
                }else{
                    $apiResponse = false;
                    $provider = "irecharge";
                    $code = $response['status'];
                    $message = $response['message'];
                    $storeMessage = $code.' : '.$message ;
                }
            }
        }

        if ($api_provider->api_provider == "irecharge"){

            $response = $this->processData($request, $reference_id);

            if ($response['status']){
                if($response['status']  == 00){
                    $apiResponse = true;
                    $provider = "irecharge";
                    $code = $response['status'];
                    $message = $response['message'];
                    $storeMessage = $code.' : '.$message ;
                }else{
                    $apiResponse = false;
                    $provider = "irecharge";
                    $code = $response['status'];
                    $message = $response['message'];
                    $storeMessage = $code.' : '.$message ;
                }
            }
        }

        if ($apiResponse == true){

            Helpers::processAirtimeTransactionAndDeductWallet($title, $check_code->title, $request, $api_provider, $reference_id, $network, $provider, $storeMessage, 'Fulfilled');

            return redirect()->back()->with('success', 'Your transaction was successful');
            
        }else{

            Helpers::processAirtimeTransactionAndDeductWallet($title, $check_code->title, $request, $api_provider, $reference_id, $network, $provider, $storeMessage, 'Failed');

            return redirect()->back()->with('error', 'Sorry cannot complete transaction at the moment. Please try again later!!');
        }
    }

    public function processData(Request $request, $reference_id)
    {
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
            $walletReport->details = 'SP Bonus Reward for a Transaction above 1000SKC';
            $walletReport->amount = $pvCredit;
            $walletReport->amount_paid = $amount_paid;
            $walletReport->category = 'Data';
            $walletReport->remarks = 'Successful';
            $walletReport->transaction_type = 'Credit';
            $walletReport->balance = $find_wallet->pv_balance;

            $walletReport->save();
            
        }
        
    }
}
