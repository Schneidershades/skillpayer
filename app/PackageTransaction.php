<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\User;

class PackageTransaction extends Model
{
    protected $fillable = [
        'title' ,
        'status' ,
        'finished',
    ];


	protected static function boot()
    {
    	parent::boot();

    	static::creating(function($file){
    		$file->identifier = 'pkgtrans'.uniqid(true);
    	});
    }
    
     public function scopeFinished(Builder $builder)
    {
        return $builder->where('finished', true);
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
