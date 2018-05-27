<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DataTransaction extends Model
{
    protected static function boot()
    {
    	parent::boot();

    	static::creating(function($file){
    		$file->identifier = 'data'.uniqid(true);
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

    public function scopeFinished(Builder $builder)
    {
        return $builder->where('finished', true);
    }
}
