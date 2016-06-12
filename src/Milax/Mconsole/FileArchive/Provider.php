<?php

namespace Milax\Mconsole\FileArchive;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // ..
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Milax\Mconsole\FileArchive\Contracts\Repository\FileArchivesRepository', 'Milax\Mconsole\FileArchive\Repository\FileArchivesRepository');
    }
}
