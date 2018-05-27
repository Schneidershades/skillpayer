<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Referral;
use App\Wallet;
use App\WalletFund;
use App\Transfer;
use App\PackageTransaction;
use App\Withdrawal;
use App\Package;
use App\Profile;
use App\Advert;
use App\Upload;

use App\Models\Products\AirtimeTransaction;
use App\Models\Products\DataTransaction;
use App\Models\Products\DigitalTvTransaction;
use App\Models\Products\PowerTransaction;
use App\Models\Products\AgricLoan;
use App\SmsTextTransaction;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'email', 
        'slug', 
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'verification_token',
    ];

    public static function generateVerificationCode()
    {
        return str_random(40);
    }

    public function referrals()
    {
       return $this->hasMany(Referral::class, 'referral_id');
    }
    
    public function connection()
    {
       return $this->hasOne(Referral::class, 'user_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function walletFund()
    {
        return $this->hasMany(WalletFund::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function sendMoney()
    {
        return $this->hasMany(Transfer::class, 'sender_id');
    }

    public function packageTransactions()
    {
        return $this->hasMany(PackageTransaction::class);
    }

    public function recieveMoney()
    {
        return $this->hasMany(Transfer::class, 'reciever_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function adverts(){
        return $this->hasMany(Advert::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function smsTextTransactions()
    {
        return $this->hasMany(SmsTextTransaction::class);
    }

    public function walletTransactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function airtimeTransactions()
    {
        return $this->hasMany(AirtimeTransaction::class);
    }

    public function powerTransactions()
    {
        return $this->hasMany(PowerTransaction::class);
    }

    public function dataTransaction()
    {
        return $this->hasMany(DataTransaction::class);
    }

    public function smsTransaction()
    {
        return $this->hasMany(SmsTextTransaction::class);
    }

    public function tvTransactions()
    {
        return $this->hasMany(DigitalTvTransaction::class);
    }
    public function agricLoanProfile()
    {
        return $this->hasOne(AgricLoan::class);
    }

}
