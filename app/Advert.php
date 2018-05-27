<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\SubCategory;
use App\Category;
use App\Upload;
use App\User;
use App\Tag;
use App\State;
use App\City;

class Advert extends Model
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
    		$file->identifier = 'advert'.uniqid(true);
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

    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function uploads()
    {
    	return $this->hasMany(Upload::class);
    }
    
    public function state()
    {
    	return $this->belongsTo(State::class);    
    }
    
    public function city()
    {
    	return $this->belongsTo(City::class);    
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
