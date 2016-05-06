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
        app('API')->repositories->register('filearchives', new \Milax\Mconsole\FileArchive\FileArchiveRepository(\Milax\Mconsole\FileArchive\Models\FileArchive::class));
        
        $this->app->when('\Milax\Mconsole\FileArchive\Http\Controllers\FileArchivesController')
            ->needs('\Milax\Mconsole\Contracts\Repository')
            ->give(function () {
                return app('API')->repositories->filearchives;
            });
    }
}
