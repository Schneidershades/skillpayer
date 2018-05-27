<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsTextTransaction extends Model
{
    protected static function boot()
    {
    	parent::boot();

    	static::creating(function($file){
    		$file->identifier = 'sms'.uniqid(true);
    	});
    }

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
