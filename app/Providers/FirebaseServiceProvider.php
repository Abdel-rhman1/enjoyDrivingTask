<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Log;
class FirebaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('firebase', function ($app) {
            $serviceAccountPath = env('FIREBASE_CREDENTIALS');
            
            return (new Factory)
                ->withServiceAccount($serviceAccountPath)
                ->create();
        });
    }

    public function boot()
    {
        //
    }
}
