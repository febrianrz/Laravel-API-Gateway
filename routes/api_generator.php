<?php 

use App\Models\Endpoint;

foreach(Endpoint::where('is_active',1)->get() as $e){
  Route::get('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::post('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::put('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::delete('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
  Route::patch('/'.$e->path.'/{query?}','ProxyController@generateRequest')->where('query','.+');
}
