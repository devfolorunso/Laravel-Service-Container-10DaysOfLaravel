<?php

namespace App\Providers;

use App\Billing\CreditPaymentGateway;
use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Get the difference between bind and singleton
        //a singleton is a way of telling laravel that there is going to be one of this payment gateways

        $this->app->singleton(PaymentGatewayContract::class, function($app)
        {
            if(request()->has('credit'))
            {
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('USD');
            //return new CreditPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
