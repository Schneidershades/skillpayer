<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Advert;

class Tag extends Model
{
    public function adverts()
    {
    	return $this->belongsToMany(Advert::class);
    }
}
