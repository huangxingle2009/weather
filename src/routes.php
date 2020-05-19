<?php
Route::group(['prefix' => '', 'namespace' => 'Hbl\Weather\App\Http\Controllers', 'middleware' => []], function () {
    Route::get('/weather', 'WeatherController@test');
});
