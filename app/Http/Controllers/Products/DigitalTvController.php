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
use App\Models\Api\Provider\Irecharge\IrechargeDigitalTvService;
use App\Models\Products\DigitalTvTransaction;
use App\Models\Api\Provider\Vtpass\VtpassApiCategory;
use App\Models\Api\Provider\Vtpass\VtpassApiService;
use App\Models\Api\Provider\Vtpass\VtpassApiServiceVariation;

class DigitalTvController extends Controller
{
    public function processTv(Request $request){
          
        // check api provider
        $api_provider = ServiceSetting::where('code', strtolower($request->tv_network))->where('type', 'Tv')->first();
        if ($api_provider === NULL){
            return redirect()->back()->with('error', 'Service is unavailable at the moment. Please Try again Later');
        }

        if($api_provider->api_provider == 'irecharge' && $request->has('tv_code')){
            $check_code = IrechargeDigitalTvService::where('code', $request->tv_code)->first();

            $amount = $check_code->price;

            if ($check_code === NULL){
                return redirect()->back()->with('error', 'Please tv bouquet not available');
            }
        }

        if($api_provider->api_provider == 'vtpass' && $request->has('tv_code')){
            $check_code  = VtpassApiServiceVariation::where('parent_code', $request->tv_network)->where('code', $request->tv_code)->first();

            if ($check_code === NULL){
                return redirect()->back()->with('error', 'Please tv bouquet not available');
            }

            if ($check_code->price == 0){
                return redirect()->back()->with('error', 'Service unavailable');
            }else{
                $amount = $check_code->price;
            }
        }

        // check users balance
        if(Auth::user()->wallet->skill_coin_balance < $amount){
            return redirect()->back()->with('error', 'you have insufficent balance to make transactions');
        }   

        if($amount < $api_provider->minimum_value || $amount > $api_provider->maximum_value){
            return redirect()->back()->with('error', 'You can only process amount between '. $api_provider->minimum_value. ' and ' .$api_provider->maximum_value);
        }

        $reference_id = mt_rand(100000000000, 999999999999);

        $title = $request->tv_network .' '.$check_code->title . " to " .$request->tv_number;

        if ($api_provider->api_provider == "irecharge"){

            $response = Helpers::getSmartcardInfo($request, $reference_id);

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

        if ($api_provider->api_provider == "vtpass"){

            $getDisco = VtpassApiService::where('service_id', $serviceID)->first();

            if($getDisco == null){
                return redirect()->back()->with('error', 'Sorry cannot complete transaction at the moment. Please try again later!!');
            }

            if($getDisco->product_type == 'fix'){
                $response = Helpers::vendVtpassFlexi($request, $reference_id);

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

            if($getDisco->product_type == 'flexible'){

                $response = Helpers::vendVtpassFix($request, $reference_id, $serviceID, $request->tv_smartcard, $check_code->variation_code, null, $request->tv_number);

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

        if ($apiResponse == true){

            Helpers::processDigitalTvAndDeductWallet($title, $amount, $request, $api_provider, $reference_id, $request->tv_network, $api_used, $api_response, 'Fulfilled');

            return redirect()->back()->with('success', 'Your transaction was successful ');
            
        }else{
             Helpers::processDigitalTvAndDeductWallet($title, $amount, $request, $api_provider, $reference_id, $request->tv_network, $api_used, $api_response, 'Failed');
            return redirect()->back()->with('error', 'Sorry cannot complete transaction at the moment. Please try again later!!');
        }
    }

}
