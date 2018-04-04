<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Google_Client;

class GoogleClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('\Google_Client', function ($app) {
        return new Google_Client(config('services.google_client'));
      });
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
      return ['\Google_Client'];
    }
    
    protected $defer = true;
}
