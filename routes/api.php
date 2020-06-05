<?php

use Illuminate\Http\Request;


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
