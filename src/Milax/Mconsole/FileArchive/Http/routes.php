<?php

/**
 * Files module routes file
 */
Route::group([
    'prefix' => config('mconsole.url'),
    'middleware' => ['web', 'mconsole'],
    'namespace' => 'Milax\Mconsole\FileArchive\Http\Controllers',
], function () {
    
    Route::resource('filearchives', 'FileArchivesController');

});
