<?php

namespace App\Services;

use App\Models\City;
use App\Models\WeatherStats;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class ApixService
{
    public function query(String $apiKey, Collection $cities): Collection{

   $result = collect();


   $ObjquzzleClient = New Client([
       'base_uri'=>'https://api.apixu.com/',
   ]);


   foreach ($cities as $city){
       DB::connection()->enableQueryLog();
       $response = $ObjquzzleClient->get('v1/current.json',[
       'query'=>[
           'key'=>$apiKey,
           'q'=>$city->name,
            ]
       ]);

       $response = json_decode($response->getBody()->getContents(),true);
       $stat = new WeatherStats();

       //$stat->city()
        $stat->city()->associate($city);
        // in here this city method will gerate city_id automatically``



      // $stat->city_relation_id =
       $stat->temp_celsius = $response['current']['temp_c'];

       $stat->status = $response['current']['condition']['text'];
       $stat->last_update = Carbon::createFromTimestamp($response['current']['last_updated_epoch']);
       $stat->provider = 'apixu.com';



       $stat->save();



       $result->push($stat);


   }

        DB::enableQueryLog(); // Enable query log
        // Your Eloquent query
        dd(DB::getQueryLog()); // Show results of log
        return $result;
    }


}
