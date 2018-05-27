<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\City;
use App\Advert;

class State extends Model
{
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function city()
    {
    	return $this->hasMany(City::class);
    }
    
    public function advert()
    {
        return $this->hasMany(Advert::class);
    }
}
