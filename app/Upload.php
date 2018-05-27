<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Advert;
use App\User;

class Upload extends Model
{
	protected $fillable = [
        'filename' ,
        'size' ,
        'user_id' ,
    ];
    
    public function advert()
    {
    	return $this->belongsTo(Advert::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
