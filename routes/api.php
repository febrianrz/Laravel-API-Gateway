<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Endpoint;

foreach(Endpoint::where('is_active',1)->get() as $e){
  Route::get('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::post('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::put('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::delete('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::patch('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
}

Route::middleware(['alt_sso'])->group(function(){
  Route::namespace('Api')->group(function(){
    
    
    /* make:api New Route */
  });
});
