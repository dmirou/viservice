<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Google_Service_YouTube;

class GoogleServiceYoutubeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('\Google_Service_YouTube', function ($app) {
        
        $google_client = resolve('\Google_Client');
    
        return new Google_Service_YouTube($google_client);
      });
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
      return ['\Google_Service_YouTube'];
    }
    
    protected $defer = true;
}
