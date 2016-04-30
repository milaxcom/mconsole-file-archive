<?php

/**
 * Files module routes file
 */
Route::group([
    'prefix' => 'mconsole',
    'middleware' => ['web', 'mconsole'],
    'namespace' => 'Milax\Mconsole\FileArchive\Http\Controllers',
], function () {
    
    Route::resource('filearchives', 'FileArchivesController');

});
