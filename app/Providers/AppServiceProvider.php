<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreated;
use View;
use Auth;
use App\User;
use App\Setting;
use App\Models\Products\ServiceSetting;
use App\Category;
use App\State;
use App\WalletTransaction;
use App\Models\Api\Provider\Irecharge\IrechargePowerService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created(function($user){
            Mail::to($user)->send(new UserCreated($user));
        });


        View::share('web', Setting::first());
        View::share('states', State::all());
        View::share('professions', Category::all());
        View::share('admin_notifications', WalletTransaction::all());
        View::share('notifications', WalletTransaction::where('user_id', Auth::id())->get());


        View::share('tv_services', ServiceSetting::where('type', 'TV')->where('enable', 'Yes')->get());
        View::share('data_services', ServiceSetting::where('type', 'Data')->where('enable', 'Yes')->get());
        View::share('airtime_services', ServiceSetting::where('type', 'Airtime')->where('enable', 'Yes')->get());
        View::share('discos', ServiceSetting::where('type', 'Power')->where('enable', 'Yes')->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
