<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PackageFeature;

class Package extends Model
{
	protected $fillable = [
        'title' ,
        'status' ,
        'finished' ,
        'amount',
    ];
    
    public function user()
    {
    	return $this->hasOne(User::class);
    }

    public function packageFeatures()
    {
       return $this->hasMany(PackageFeature::class);
    }
}
