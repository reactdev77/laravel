<?php

namespace App\Providers;

use App\MyLibrary\Laravel\CustomMySqlGrammar;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //@todo remove after global fix: temporary fix of MySQL column case
        \DB::connection()->setSchemaGrammar(new CustomMySqlGrammar());

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mailgun.client', function() {
	      return \Http\Adapter\Guzzle6\Client::createWithConfig([
		   // your Guzzle6 configuration
	       ]);
         });
    }
}
