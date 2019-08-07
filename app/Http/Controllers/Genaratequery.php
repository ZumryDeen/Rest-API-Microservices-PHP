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

      //  dd($city->weatherStat()->first());

 //this->response->item($city->weatherStat()->first(),new WeatherStatTransformer()) ;

        return $this->response->item($city->weatherStat()->first(),New WeatherStatTransformer());




    }

    public function all($city){

        if(!($city= City::where('name',$city)->first));
        throw new NotFoundHttpException('Unkown City');

        return $this->response->collection($city->weatherStat()->first(),New WeatherStatTransformer());

    }


}
