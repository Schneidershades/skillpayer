<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\Provider\Irecharge\IrechargeDataService;
use App\Models\Api\Provider\Irecharge\IrechargeDigitalTvService;
use App\SubCategory;
use App\State;
use App\City;
use App\Models\Products\ServiceSetting;
use App\Models\Api\Provider\Vtpass\VtpassApiCategory;
use App\Models\Api\Provider\Vtpass\VtpassApiService;
use App\Models\Api\Provider\Vtpass\VtpassApiServiceVariation;

class JsController extends Controller
{
    public function getDataPlans($network)
    {
        $api_provider = ServiceSetting::where(strtolower('code'), strtolower($network))->where('type', 'Data')->first();

        if($api_provider->api_provider == 'irecharge'){
            $plans = IrechargeDataService::where('network', $network)->get();
        }

        if($api_provider->api_provider == 'vtpass'){
            if($network == 'mtn'){
                $network = 'mtn-data';
            }
            if($network == 'airtel'){
                $network = 'airtel-data';
            }

            if($network == 'glo'){
                $network = 'glo-data';
            }
            if($network == 'etisalat'){
                $network = 'etisalat-data';
            }

            $plans = VtpassApiServiceVariation::where(strtolower('network'), strtolower($network))->get();
        }

        return $plans;
    }

    public function getTvBouquet($network)
    {

        $api_provider = ServiceSetting::where(strtolower('code'), strtolower($network))->where('type', 'Tv')->first();

        if(strtolower($api_provider->api_provider) == 'irecharge'){
            $bouquets = IrechargeDigitalTvService::where(strtolower('network'), strtolower($network))->get();
        }

        if(strtolower($api_provider->api_provider) == 'vtpass'){

            if($network == 'startimes'){
                $network = 'startimes';
            }

            $bouquets = VtpassApiServiceVariation::where(strtolower('network'), strtolower($network))->get();
        }

        return $bouquets;
    }

    public function getAdvertSubCategories($category_id)
    {
        $sub = SubCategory::where('category_id', $category_id)->get();
        return $sub;
    }

    public function getStates($country_id)
    {
        $state = State::where('country_id', $country_id)->get();
        return $state;
    }

    public function getCity($state_id)
    {
        $city = City::where('state_id', $state_id)->get();
        return $city;
    }
}
