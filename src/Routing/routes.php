<?php

use Illuminate\Routing\Router;

/**
 * demo
 */
Route::group([
    'namespace' => 'Kingofzihua\Tool',
    'prefix' => config("tool.prefix"),
    'middleware' => ['web'],
], function (Router $router) {
    Route::group(['prefix' => 'env'], function (Router $router) {
        Route::any('/', "Env@index");
    });
    Route::group(['prefix' => 'log'], function (Router $router) {
        Route::get('/', "Log@index");
        Route::get('/get', function () {
            echo "getLog";
        });
        Route::get('/reset', "Log@reset");
        Route::get('/deleted', "Log@deleted");
    });
});