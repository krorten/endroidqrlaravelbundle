<?php
/**
 * Created by PhpStorm.
 * User: jelle
 * Date: 23-12-2016
 * Time: 10:05
 */

route::group(['middleware' => ['web'], 'prefix' => '/qr'], function(){
    Route::get('/create/{messages}', 'EndroidQr@urlCreate');
});