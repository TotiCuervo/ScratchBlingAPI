<?php

use Illuminate\Http\Request;

//the Auth api ensures that an api token must be passed in order to access these endpoints
//the jsonOnly middleware ensures that all requests return as JSON. Due to laravel sometimes returning HTML for responses
//this is necessary
Route::group(['namespace' => 'api', 'middleware' => ['jsonOnly', 'auth:api']], function () {
    //gets all backscratchers
    Route::get('/backscratcher', 'BackScratcherController@index');
    //gets specific backscratcher
    Route::get('/backscratcher/{backScratcher}', 'BackScratcherController@show');
    //creates new backscratcher
    Route::post('/backscratcher', 'BackScratcherController@store');
    //updates backscratcher
    Route::patch('/backscratcher/{backScratcher}', 'BackScratcherController@update');
    //delete backscratcher if you wanted to
//    Route::delete('/backscratcher/{backScratcher}', 'BackScratcherController@destroy');
});

//this is a catch all for all other api requests
Route::fallback(function(){
    return response()->json([
        'message' => 'Sorry, this is one back we cannot scratch. 404 Not Found'], 404);
});
