<?php


namespace App\Services;




use App\Models\City;

class QueryService
{

    protected $apixService;


    public function __construct(ApixService $objapixService)
    {
        $this->apixService=$objapixService;
    }




    public function queryAll(){


        $cities = City::all();

        $this->apixService->query(env('APIXU_APIKEY'),$cities);

       // $this->ApixService->query(env('APIXU_APIKEY',$cities));

    }


}
