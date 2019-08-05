<?php

namespace App\Http\Controllers;

use App\Http\Transformers\WeatherStatTransformer;
use App\Models\City;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Genaratequery extends Controller
{
    public function current($city) {


        if(!($city = City::where('name', $city)->first()))
            throw new NotFoundHttpException('Unknown city!');

       echo      $this->response->item($city->weatherStat()->first(),new WeatherStatTransformer()) ;
       // return $this->response->item($city->weatherStats()->first(), new WeatherStatTransformer());

    }
}
