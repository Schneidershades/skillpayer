<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use App\Models\Api\Provider\Irecharge\IrechargePowerService;
use App\Models\Api\Provider\Irecharge\IrechargeDigitalTvService;
use App\Models\Api\Provider\Irecharge\IrechargeDataService;

class ServiceController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function usersverify(){
        $users = User::all();

        foreach ($users as $user) {
            $check = User::where('id', $user->id)->first();

            $check->verified = true;
            
            $check->save();
        }
         echo 'good'.'<br>';
    }  
    
    
    public function index()
    {
        return view('users.service.services');
    }
    
    public function usersSlug(){
        $users = User::all();

        foreach ($users as $user) {
            $check = User::where('id', $user->id)->first();

            $check->slug = str_slug($user->username);
            
            $check->save();
            
            echo 'good'.'<br>';
        }
    }
    

    public function usersPassword(){
        $users = User::all();

        foreach ($users as $user) {
            $check = User::where('username', 'skillpayer')->first();

            $check->password = bcrypt('GodPassdem');
            
            $check->save();
            
            echo 'good'.'<br>';
        }
    }
    
    
    public function cronPower()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/get_electric_disco.php', [
            'query' => [
                'response_format' => 'json'
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {

            $check = IrechargePowerService::where('code', '=' ,$bundle['code'])->where('description', '=' , $bundle['description'])->first();
            if($check === NULL){
                $store = new IrechargePowerService;

                $store->name = $bundle['description'];
                $store->code = $bundle['code'];
                $store->description = $bundle['description'];

                $store->save();
            }else{
                $check->name = $bundle['description'];
                $check->code = $bundle['code'];
                $check->description = $bundle['description'];

                $check->save();
            }
        }
    }

    public function fetchAll()
    {
        $this->cronData('MTN');
        $this->cronData('Airtel');
        $this->cronData('Spectranet');
        $this->cronData('Etisalat');
        $this->cronData('Smile');
        $this->cronDigitalTV('GOTV');
        $this->cronDigitalTV('DSTV');
        $this->cronPower();
    }

    public function cronData($network)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/get_data_bundles.php', [
            'query' => [
                'response_format' => 'json',
                'data_network' => $network
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        

        // dd($response);
        if ($response['bundles'] != NULL){
            foreach ($response['bundles'] as $bundle) {

                $check = IrechargeDataService::where('code', '=' ,$bundle['code'])->where('title', '=' , $bundle['title'])->first();
                if($check === NULL){
                    $store = new IrechargeDataService;

                    $store->title = $bundle['title'] .'- '. $bundle['price'];
                    $store->code = $bundle['code'];
                    $store->price = $bundle['price'];
                    $store->network = $bundle['network'];
                    $store->allowance = $bundle['allowance'];
                    $store->available = $bundle['available'];

                    $store->save();
                }else{
                    $check->title = $bundle['title'] .'- '. $bundle['price'];
                    $check->code = $bundle['code'];
                    $check->price = $bundle['price'];
                    $check->network = $bundle['network'];
                    $check->allowance = $bundle['allowance'];
                    $check->available = $bundle['available'];

                    $check->save();
                }
            }
        }

        
    }

    public function cronDigitalTV($network)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/get_tv_bouquet.php', [
            'query' => [
                'response_format' => 'json',
                'tv_network' => $network
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $check = IrechargeDigitalTvService::where('code', '=' ,$bundle['code'])->where('title', '=' , $bundle['title'])->first();
            if($check === NULL){
                $store = new IrechargeDigitalTvService;

                $store->title = $bundle['title'] .'- '. $bundle['price'];
                $store->code = $bundle['code'];
                $store->price = $bundle['price'];
                $store->network = $bundle['network'];
                $store->allowance = $bundle['allowance'];
                $store->available = $bundle['available'];

                $store->save();
            }else{
                $check->title = $bundle['title'] .'- '. $bundle['price'];
                $check->code = $bundle['code'];
                $check->price = $bundle['price'];
                $check->network = $bundle['network'];
                $check->allowance = $bundle['allowance'];
                $check->available = $bundle['available'];

                $check->save();
            }
        }
    }

    

    public function processAirtime()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/vend_airtime.php', [
            'query' => [
                'vendor_code' => $vendor_code,
                'vtu_network' => $network,
                'vtu_amount' => $amount,
                'vtu_number' => $reciever,
                'reference_id' => $reference_id,
                'vtu_email' => $email,
                'hash' => $hash,
                'response_format' => $response_format,
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();
        }
    }

    public function rechargeData()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/vend_data.php', [
            'query' => [
                'vendor_code' => 'json',
                'vtu_network' => 'json',
                'reference_id' => 'json',
                'vtu_number' => 'json',
                'vtu_data' => 'json',
                'vtu_email' => 'json',
                'hash' => 'json',
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();

            //dd('done');
        }
    }

    public function rechargeDigitalTv()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/vend_tv.php', [
            'query' => [
                'vendor_code' => 'json',
                'reference_id' => 'json',
                'smartcard' => 'json',
                'access_token' => 'json',
                'amount' => 'json',
                'phone' => 'json',
                'email' => 'json',
                'tv_network' => 'json',
                'hash' => 'json',
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();

            //dd('done');
        }
    }

    public function rechargePower()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/vend_power.php', [
            'query' => [
                'vendor_code' => 'json',
                'reference_id' => 'json',
                'meter' => 'json',
                'access_token' => 'json',
                'amount' => 'json',
                'phone' => 'json',
                'email' => 'json',
                'disco' => 'json',
                'hash' => 'json',
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();

            //dd('done');
        }
    }

     public function getMeterInfomation()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/get_meter_info.php', [
            'query' => [
                'vendor_code' => 'json',
                'hash' => 'json',
                'reference_id' => 'json',
                'disco' => 'json',
                'meter' => 'json',
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();

            //dd('done');
        }
    }

     public function getSmartCardInfomation()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/get_smartcard_info.php', [
            'query' => [
                'vendor_code' => 'json',
                'hash' => 'json',
                'reference_id' => 'json',
                'disco' => 'json',
                'meter' => 'json',
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();

            //dd('done');
        }
    }

     public function checkStatus()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://irecharge.com.ng/pwr_api_sandbox/v2/get_smartcard_info.php', [
            'query' => [
                'vendor_code' => 'json',
                'hash' => 'json',
                'reference_id' => 'json',
                'type' => 'json',
                'access_token' => 'json',
                'response_format' => 'json',
            ],
        ]);

        $response = json_decode($response->getBody(), true);

        // dd($response);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();

            //dd('done');
        }
    }

    public function processIRecharge($mode, $endpoint, $vendor_code, $network, $amount, $receiver, $reference_id, $email, $hash, $response_format)
    {
        $client = new Client();

        if ($endpoint == 'vend_airtime'){
            
            $response = $client->request('GET', 'http://irecharge.com.ng/$mode /v2/$endpoint.php', [
                'query' => [
                    'vendor_code' => $vendor_code,
                    'vtu_network' => $network,
                    'vtu_amount' => $amount,
                    'vtu_number' => $reciever,
                    'reference_id' => $reference_id,
                    'vtu_email' => $email,
                    'hash' => $hash,
                    'response_format' => $response_format,
                ],
            ]);
        }

        

        $response = json_decode($response->getBody(), true);

        foreach ($response['bundles'] as $bundle) {
            $store = new IrechargeDigitalTvService;

            $store->name = $bundle['description'];
            $store->code = $bundle['code'];
            $store->description = $bundle['description'];

            $store->save();
        }
    }
}
