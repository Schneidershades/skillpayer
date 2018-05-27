<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Advert;

class SubCategory extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    public function adverts()
    {
    	return $this->hasMany(Advert::class);
    }
}
