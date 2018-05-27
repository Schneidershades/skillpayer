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
use App\Models\Products\PowerTransaction;
use App\Models\Api\Provider\Vtpass\VtpassApiCategory;
use App\Models\Api\Provider\Vtpass\VtpassApiService;
use App\Models\Api\Provider\Vtpass\VtpassApiServiceVariation;

class PowerController extends Controller
{
    public function processPwr(Request $request)
    {
        $title = 'Token NGN '.$request->power_amount. " to " .$request->power_meter;

        // check users balance
        if(Auth::user()->wallet->skill_coin_balance < $request->power_amount){
            return redirect()->back()->with('error', 'you have insufficent balance to make transactions');
        }

        if(Auth::user()->wallet->skill_coin_balance < $request->power_amount){
            return redirect()->back()->with('error', 'you have insufficent to make transactions');
        }

        // check api provider
        $api_provider = ServiceSetting::where('code', $request->power_disco)->where('type', 'Power')->first();
        if ($api_provider === NULL){
            return redirect()->back()->with('error', 'Service is unavailable at the moment. Please Try again Later');
        }

        if($request->power_amount < $api_provider->minimum_value || $request->power_amount > $api_provider->maximum_value){
            return redirect()->back()->with('error', 'You can only process amount between '. $api_provider->minimum_value. ' and ' .$api_provider->maximum_value);
        }
        
        $reference_id = mt_rand(1000, 9999);
        
        if ($api_provider->api_provider == "vtpass"){

            if($request->power_disco == 'AEDC'){
                $serviceID = 'abuja-electric';
            }

            if($request->power_disco == 'Kano_Electricity_Disco'){
                $serviceID = 'kano-electric';
            }

            if($request->power_disco == 'PhED_Electricity'){
                $serviceID = 'portharcourt-electric';
            }

            if($request->power_disco == 'Jos_Disco'){
                $serviceID = 'jos-electric';
            }

            if($request->power_disco == 'enugu-electric'){
                $serviceID = 'enugu-electric';
            }

            $getDisco = VtpassApiService::where('service_id', $serviceID)->first();


            if($getDisco == null){
                return redirect()->back()->with('error', 'Sorry cannot complete transaction at the moment. Please try again later!!');
            }

            if($request->power_amount < $getDisco->minimum_amount){
                return redirect()->back()->with('error', 'Please minimum amount required at the moment is '. $getDisco->minimum_amount);
            }

            if($getDisco->product_type == 'flexible'){
                $response = Helpers::vendVtpassFlexiPower($reference_id, $serviceID, $request->power_meter, 0, $request->power_amount, $request->power_number);

                dd($response);

                if($response['code']  == 000){
                    $apiResponse = true;
                    $api_used = "vtpass";
                    $code = $response['code'];
                    $message = $response['response_description'];
                    $api_response = $code.' : '.$message ;
                }else{
                    
                    // array:7 [▼
                    //   "code" => "016"
                    //   "response_description" => "TRANSACTION FAILED"
                    //   "requestId" => "5404"
                    //   "payload" => "{"serviceID":"abuja-electric","billersCode":"04141923815","variation_code":"0","amount":"1000","phone":"07037495705","request_id":"5404","meter_number":"04141923815","email":"housingevangelist@gmail.com"} ◀"
                    //   "amount" => "1000.00"
                    //   "transaction_date" => array:3 [▼
                    //     "date" => "2018-03-23 19:12:33.000000"
                    //     "timezone_type" => 3
                    //     "timezone" => "Africa/Lagos"
                    //   ]
                    //   "purchased_code" => ""
                    // ]

                    $apiResponse = false;
                    $api_used = "vtpass";
                    $code = $response['code'];
                    $message = $response['response_description'];
                    $api_response = $code.' : '.$message ;
                }
            }

            if($getDisco->product_type == 'fixed'){
                $getDiscoVariation  = VtpassApiServiceVariation::where('service_id', $serviceID)->where('variation_code', $code)->first();

                if ($getDiscoVariation->variation_amount == 0){
                    $amount = $request->power_amount;
                }else{
                    $amount = $getDiscoVariation->variation_amount;
                }

                $response = Helpers::vendVtpassFlexiPower($reference_id, $serviceID, $power_meter, $getDiscoVariation->variation_code, $amount, $power_number);

                dd($response);

                if($response['code']  == 000){
                    $apiResponse = true;
                    $api_used = "vtpass";
                    $code = $response['code'];
                    $message = $response['response_description'];
                    $api_response = $code.' : '.$message ;
                }else{
                    $apiResponse = false;
                    $api_used = "vtpass";
                    $code = $response['code'];
                    $message = $response['response_description'];
                    $api_response = $code.' : '.$message ;
                }
            }
            
        }

        if ($api_provider->api_provider == "irecharge"){
            
            $response = Helpers::getMeterInfo($request, $reference_id);
            
            if($response['status'] == 00){
                if($response['minimum_purchase'] != NULL){
                    if($response['minimum_purchase'] > $request->power_amount){
                        return redirect()->route('services')->with('success', 'Your meter minimum purchase paid is N'. $response['minimum_purchase']);
                    } 
                }
            }
            
            $response = Helpers::vendPowerIrechargeApi($request, $response, $reference_id);

            if($response['status']  == 00 && $response['status'] != NULL){
                $apiResponse = true;
                $api_used = "irecharge";
                $code = $response['status'];
                $message = $response['message'];
                $api_response = $code.' : '.$message ;
            }else{
                $apiResponse = false;
                $api_used = "irecharge";
                $code = $response['status'];
                $message = $response['message'];
                $api_response = $code.' : '.$message ;
            }
            
        }

        if ($apiResponse == true){
            
            Helpers::processPowerTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $api_used, $api_response, 'Fulfilled', $response);

            return redirect()->back()->with('success', 'Your transaction was successful ');
            
        }else{
            Helpers::processPowerTransactionAndDeductWallet($title, $request, $api_provider, $reference_id, $api_used, $api_response, 'Failed', $response);
            return redirect()->back()->with('error', $message);
        }


    }
 
}
