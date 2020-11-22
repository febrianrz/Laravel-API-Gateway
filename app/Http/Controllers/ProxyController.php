<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Endpoint;
class ProxyController extends Controller
{
    public function generateRequest(Request $request, $args)
    {
        $method = strtolower($request->getMethod());
        
        return $this->requestData($request, $method, $args);
    }

    public function requestData(Request $request, $method, $args)
    {
        $paths = explode('/',$request->path());
        $point = Endpoint::where('path',$paths[1])->first();
        if(!$point) return abort(404);
        
        $url = "{$point->url}/{$args}";

        $response = Http::withHeaders([
            'Accept'            => 'application/json',
            'Authorization'     => $request->header('Authorization') 
        ])->{$method}($url, $request->all());

        return $response->json();
    }
}
