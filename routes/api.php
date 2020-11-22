<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
include("api_generator.php");

Route::middleware(['alt_sso'])->group(function(){
  Route::namespace('Api')->group(function(){
    Route::prefix('/v1')->group(function(){
      Route::apiResource('/endpoints','EndpointController');
      Route::post('/endpoints-reset','EndpointController@reset');
    });
    
    /* make:api New Route */
  });
});
