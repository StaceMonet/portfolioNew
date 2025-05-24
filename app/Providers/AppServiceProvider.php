<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;
use Symfony\Component\Mailer\Bridge\Sendgrid\Transport\SendgridApiTransport;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make(MailManager::class)->extend('sendgrid', function () {
            return new SendgridApiTransport(Config::get('services.sendgrid.api_key'));
    	});
    }
}
