<?php

/**
 * Files module routes file
 */
Route::group([
    'prefix' => 'mconsole',
    'middleware' => ['web', 'mconsole'],
    'namespace' => 'App\Mconsole\Files\Http\Controllers',
], function () {
    
    //

});
