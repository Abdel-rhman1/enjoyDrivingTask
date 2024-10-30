<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Log;
use App\Http\Services\FirebaseService;
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

        $this->app->singleton(FirebaseService::class, function ($app) {
            return new FirebaseService();
        });
    }

    public function boot()
    {
        //
    }
}
