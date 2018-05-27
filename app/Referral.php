<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Referral extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function referralUser()
    {
    	return $this->belongsTo(User::class);
    }
}
