<?php

namespace App\Http\Controllers;

use App\Http\Transformers\WeatherStatTransformer;
use App\Models\City;
use App\Services\ApixService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Genaratequery extends Controller
{

    public function test(){
        $cities = City::all();
        $resutk = new ApixService();
        return $resutk->myqry($cities);
    }

    public function current($city) {
        if(!($city = City::where('name', $city)->first()))
            throw new NotFoundHttpException('Unknown city!');
        return $this->response->item($city->weatherStat()->first(),New WeatherStatTransformer());
    }

    public function all($city){
        if(!($city= City::where('name',$city)->first));
        throw new NotFoundHttpException('Unkown City');
        return $this->response->collection($city->weatherStat()->first(),New WeatherStatTransformer());
    }


}
