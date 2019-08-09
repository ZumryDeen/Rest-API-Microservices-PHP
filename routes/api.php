<?php
use Dingo\Api\Routing\Router;

$router = app(Router::class);
$router->version('v1',function (Router $router){


    //working root : http://127.0.0.1:8001/api/weather/city/london/current



    $router->group(['namespace'=>'App\Http\Controllers'],function (Router $router){

        $router->group(['prefix'=>'status'],function (Router $router){
            $router->get('test','Servercontroller@test');

            $router->get('health','Servercontroller@health');
            $router->get('versiontest','Servercontroller@versiontest');
        });


        $router->group(['prefix' => 'weather'], function (Router $router) {

            $router->get('test','Genaratequery@test');
            $router->get('city/{city}/current', 'Genaratequery@current');
            //$router->get('city/{city}/all', 'Genaratequeryr@all');

        });

    });

});


