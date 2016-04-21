<?php

/**
 * Files module routes file
 */
Route::group([
    'prefix' => 'mconsole',
    'middleware' => ['web', 'mconsole'],
    'namespace' => 'Milax\Mconsole\Files\Http\Controllers',
], function () {
    
    Route::resource('files', 'FilesController');

});
