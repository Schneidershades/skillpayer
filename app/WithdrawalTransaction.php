<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class WithdrawalTransaction extends Model
{
    protected $fillable = [
        'status' ,
        'finished',
        'amount',
    ];

    protected static function boot()
    {
    	parent::boot();

    	static::creating(function($withdrawalTransaction){
    		$withdrawalTransaction->identifier = 'wtd'.uniqid(true);
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
