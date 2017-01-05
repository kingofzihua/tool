<?php

use Illuminate\Routing\Router;

/**
 * demo
 */
Route::group([
    'namespace' => 'Tool',
    'prefix' => 'tool'
], function (Router $router) {
    Route::get('/env', function () {
        echo "welcome";
    });
	Route::group(['prefix' => 'log'], function (Router $router) {
	    Route::get('/get', function () {echo "getLog";});
	    Route::get('/del', function () {echo "delLog";});
	});
});