<?php

namespace App\Http\Controllers;
use App\Services\APICacheService;

class APICacheController extends Controller
{
    public function getAPIData(){
        $apiCacheServie = new APICacheService();
        $data = $apiCacheServie->getData();
        dd($data);
    }

}
