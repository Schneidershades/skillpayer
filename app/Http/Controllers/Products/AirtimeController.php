<?php

namespace App\Http\Controllers\Products;

use Auth;
use App\Http\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\WebsiteApiBalance;
use App\WalletTransaction;
use App\Wallet;
use App\Models\Products\ServiceSetting;
use App\Models\Products\AirtimeTransaction;
use App\Models\Api\Provider\Vtpass\VtpassApiService;

class AirtimeController extends Controller
{
    public function processAirtime(Request $request)
    {
        if ($request->airtime_network == "MTN"){
            $network = "MTN";
        }

        if ($request->airtime_network == "Glo"){
            $network = "Glo";
        }

        if ($request->airtime_network == "Airtel"){
            $network = "Airtel";
        }

        if ($request->airtime_network == "Etisalat"){
            $network = "Etisalat";
        }

        $title = $request->airtime_amount. " " .$request->airtime_network ." to " . $request->airtime_number;

        // check users balance
        if(Auth::user()->wallet->skill_coin_balance < $request->airtime_amount){
            return redirect()->back()->with('error', 'you have an insufficent balance to make transactions');
        }     
        
        // check api provider
        $api_provider = ServiceSetting::where('code', $request->airtime_network)->where('type', 'Airtime')->where('enable', 'Yes')->first();

        if ($api_provider === NULL){
            return redirect()->back()->with('error', 'Service is unavailable at the moment. Please Try again Later');
        }

        if($request->airtime_amount < $api_provider->minimum_value || $request->airtime_amount > $api_provider->maximum_value){
            return redirect()->back()->with('error', 'You can only process amount between '. $api_provider->minimum_value. ' and ' .$api_provider->maximum_value);
        }

        $reference_id = mt_rand(1000000, 2222222);
        
        //  the fraud guy eating the life out of us
        if($request->airtime_number == '09095629158'){
            $status = 00;
            if($status  == 00){
                $successApiResponse = 'OK';
            }
            
            Helpers::processAirtimeTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $network, 'Fraud Alert', 'Fraud Alert', $status);
            
            return redirect()->back()->with('success', 'Your transaction was successful');
        }

         // vtpass
            // array:7 [▼
            //   "code" => "016"
            //   "response_description" => "TRANSACTION FAILED"
            //   "requestId" => "1192278"
            //   "payload" => "{"serviceID":"mtn","amount":"50","phone":"07037495705","request_id":"1192278","email":"housingevangelist@gmail.com"}"
            //   "amount" => "50.00"
            //   "transaction_date" => array:3 [▼
            //     "date" => "2018-03-08 06:41:52.000000"
            //     "timezone_type" => 3
            //     "timezone" => "Africa/Lagos"
            //   ]
            //   "purchased_code" => ""
            // ]
        
        
        if ($api_provider->api_provider == "irecharge"){



            $response = Helpers::vendAirtimeIrecharge($network, $request->airtime_amount, $request->airtime_number,  $reference_id);
            

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

                    $response = Helpers::vendVtpassFlexi($network, $request->airtime_amount, $request->airtime_number, $reference_id);
                    if ($response['code']){
                        if($response['code']  == 000){
                            $apiResponse = true;
                            $provider = "vtpass";
                            $code = $response['code'];
                            $message = $response['response_description'];
                            $storeMessage = $code.' : '.$message ;
                        }else{
                            $apiResponse = false;
                            $provider = "vtpass";
                            $code = $response['code'];
                            $message = $response['response_description'];
                            $storeMessage = $code.' : '.$message ;
                        }
                    }
                }
            }
        } 

        if ($api_provider->api_provider == "vtpass"){

            // dd($request->airtime_network);

            $isAvailable = VtpassApiService::where(strtolower('service_id'), strtolower($request->airtime_network))->first();
            if($isAvailable == null){
                return redirect()->back()->with('error', 'Cannot make transaction at the moment. Try again in five minutes');
            }

            $response = Helpers::vendVtpassFlexi(strtolower($request->airtime_network), $request->airtime_amount, $request->airtime_number, $reference_id);
            
            
            if ($response['code']){
                if($response['code']  == 000){
                    $apiResponse = true;
                    $provider = "vtpass";
                    $code = $response['code'];
                    $message = $response['response_description'];
                    $storeMessage = $code.' : '.$message ;
                }else{
                    $apiResponse = false;
                    $provider = "vtpass";
                    $code = $response['code'];
                    $message = $response['response_description'];
                    $storeMessage = $code.' : '.$message ;

                    // if vtpass does not go use the other 
                    $response = Helpers::vendAirtimeIrecharge($network, $request->airtime_amount, $request->airtime_number, $reference_id);
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
            }
           
        }  
        
        // for the fraud number 

        if ($apiResponse == true){

            Helpers::processAirtimeTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $network, $provider, $storeMessage, 'Fulfilled');

            return redirect()->back()->with('success', 'Your transaction was successful');
            
        }else{

            Helpers::processAirtimeTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $network, $provider, $storeMessage, 'Failed');
            

            return redirect()->back()->with('error', 'Sorry cannot complete transaction at the moment. Please try again later!!');
        }
    }
}
