<?php

namespace Shopping\Seller\Providers;

use Illuminate\Support\ServiceProvider;

class SellerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'seller');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'seller');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('shopping.seller', function ($app) {
            return $this->app->make('Shopping\Seller\Seller');
        });

                // Bind Seller to repository
        $this->app->bind(
            'Shopping\Seller\Interfaces\SellerRepositoryInterface',
            \Shopping\Seller\Repositories\Eloquent\SellerRepository::class
        );

        $this->app->register(\Shopping\Seller\Providers\AuthServiceProvider::class);
        
        $this->app->register(\Shopping\Seller\Providers\RouteServiceProvider::class);
                
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['shopping.seller'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('shopping/seller.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/seller')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/seller')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
