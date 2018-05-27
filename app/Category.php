<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;
use App\Advert;

class Category extends Model
{
    public function subCategories(){
    	return $this->hasMany(SubCategory::class);
    }

    public function adverts()
    {
    	return $this->hasMany(Advert::class);
    }
}
