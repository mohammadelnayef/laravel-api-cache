<?php 

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class APICacheService{

    public function getData(): array {

        if(Redis::exists('pokeData')){
            return ['message' => 'cache hit', Redis::get('pokeData')];
        }
        else{
            $apiData = $this->fetchAPI();
            return ['message' => 'cache miss', $this->cacheData($apiData)];
        }
    }

    //Function that fetches 1000 Pokemons from pokeapi
    private function fetchAPI(): array {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon?limit=1000&offset=0');
        return $response->json()['results'];
    }

    private function cacheData(array $data): string {
        Redis::setex('pokeData',15,json_encode($data));
        return json_encode($data);
    }

}