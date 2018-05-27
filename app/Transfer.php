<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Transfer extends Model
{

    protected $fillable = [
        'amount',
        'status' ,
        'finished',
    ];

    protected static function boot()
    {
    	parent::boot();

    	static::creating(function($file){
    		$file->identifier = 'trf'.uniqid(true);
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
