<?php

namespace App\Modules\Page\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('page', 'Resources/Lang', 'app'), 'page');
        $this->loadViewsFrom(module_path('page', 'Resources/Views', 'app'), 'page');
        $this->loadMigrationsFrom(module_path('page', 'Database/Migrations', 'app'), 'page');
        $this->loadConfigsFrom(module_path('page', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('page', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
