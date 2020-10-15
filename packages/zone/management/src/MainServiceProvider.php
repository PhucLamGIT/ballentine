<?php
namespace Zone\Management;

use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
		// Route
        include __DIR__.'/routes.php';
		
        // Language

        //$this->registerBladeExtensions();
		
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		// View
        $this->loadViewsFrom(__DIR__ . '/Views', 'management');

        //require_once __DIR__ . '/Helpers/CoreHelper.php';
        
    }
}