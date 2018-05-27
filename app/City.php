<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Advert;

class City extends Model
{
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }
}
