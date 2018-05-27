<?php

namespace App\Http\Controllers\Service\ApiProviders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use App\Models\Api\Provider\Vtpass\VtpassApiCategory;
use App\Models\Api\Provider\Vtpass\VtpassApiService;
use App\Models\Api\Provider\Vtpass\VtpassApiServiceVariation;

class VtpassController extends Controller
{
    
    public function fetchAll()
    {
        $this->serviceCategory();
    }


    public function serviceCategory()
    {
        $host = 'https://vtpass.com/api/service-categories';
        $curl       = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            // CURLOPT_USERPWD => $username.":" .$password,
            CURLOPT_TIMEOUT => 90,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            // CURLOPT_POSTFIELDS => $data,
        ));
        $cats = curl_exec($curl);
        $response = json_decode($cats,true);

        if($response['response_description'] == 000){
	        foreach ($response['content'] as $bundle) {
	        	$check = VtpassApiCategory::where('identifier', '=' , $bundle['identifier'])->first();
	        	if($check === NULL){
	               	$store = new VtpassApiCategory;
		            $store->identifier = $bundle['identifier'];
		            $store->name = $bundle['name'];
		            $store->available = 'yes';
		            $store->save();
	            }else{
		            $check->identifier = $bundle['identifier'];
		            $check->name = $bundle['name'];
		            $check->available = 'yes';
		            $check->save();
	            }
	           
                $this->services($bundle['identifier']);
	            
	        }
        }
    }

    public function services($identifier)
    {
       	// $host = 'http://vtpass.com/api/services?identifier=airtime';

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://vtpass.com/api/services?identifier=".$identifier, // the live url uses https://
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 300,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $response = json_decode($response, true);
        // dd($response);

        // VtpassApiService::truncate();

        if($response['response_description'] == 000){

		    foreach ($response['content'] as $bundle) {

		    	$check = VtpassApiService::where('service_id', $bundle['serviceID'])->first();

		    	if($check == NULL){
                    
	               	$store = new VtpassApiService;

		            $store->name = $bundle['name'];
		            $store->service_id = $bundle['serviceID'];
                    $store->minimium_amount = $bundle['minimium_amount'];
                    $store->maximum_amount = $bundle['maximum_amount'];
		            $store->product_type = $bundle['product_type'];
		            $store->available = 'Yes';
		            $store->save();

	            }else{

                    $check->name = $bundle['name'];
                    $check->service_id = $bundle['serviceID'];
                    $check->minimium_amount = $bundle['minimium_amount'];
                    $check->maximum_amount = $bundle['maximum_amount'];
                    $check->product_type = $bundle['product_type'];
                    $check->available = 'Yes';
                    $check->save();
	            }

                // if($check->product_type == 'fix' || $check->product_type == 'fix'){
                //     $this->servicesVariations($identifier);
                // }
	            
	        } 
        }
        
    }


    public function servicesVariations()
    {
        $ids = VtpassApiService::all();

        // dd($ids);

        foreach ($ids as $id){
            if ($id['product_type'] == 'fix'){

                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://vtpass.com/api/service-variations?serviceID=".$id['service_id'], // the live url uses https://
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 300,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                $response = json_decode($response, true);

                // dd($response);

                foreach ($response['content']['varations'] as $bundle) {
                    $check = VtpassApiServiceVariation::where('code', '=' ,$bundle['variation_code'])->first();

                    if($check === NULL){
                        $store = new VtpassApiServiceVariation;

                        $store->service_name = $response['content']['ServiceName'];
                        $store->network = $response['content']['serviceID'];
                        $store->convinience_fee = 0;
                        $store->code = $bundle['variation_code'];
                        $store->title = $bundle['name'];
                        $store->price = $bundle['variation_amount'];
                        $store->fixed =  $bundle['fixedPrice'];
                        // $store->available = 'yes';

                        $store->save();
                    }else{

                        $check->service_name = $response['content']['ServiceName'];
                        $check->network = $response['content']['serviceID'];
                        $check->convinience_fee = 0;
                        $check->code = $bundle['variation_code'];
                        $check->title = $bundle['name'];
                        $check->price = $bundle['variation_amount'];
                        $check->fixed =  $bundle['fixedPrice'];
                        // $check->available = 'yes';

                        $check->save();
                    }
                } 
            }
            
        }
       
    }

    public function getVerifyCustomerDetails($code, $cusctomerDetails)
    {
    	$username = "housingevangelist@gmail.com"; 
        $password = "GodPassdem1%."; 
        $host = 'https://vtpass.com/api/merchant-verify';

        $data = array(
            'serviceID'=> strtolower($code), //integer e.g mtn,airtel
            'billersCode' =>  $cusctomerDetails, // integer
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_USERPWD => $username.":" .$password,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
        ));

        $response = json_decode(curl_exec($curl), true);
    }

}
