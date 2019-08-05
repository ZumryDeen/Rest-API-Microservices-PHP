<?php
use Dingo\Api\Routing\Router;

$router = app(Router::class);
$router->version('v1',function (Router $router){

    $router->group(['namespace'=>'App\Http\Controllers'],function (Router $router){

        $router->group(['prefix'=>'status'],function (Router $router){
            $router->get('test','Servercontroller@test');

            $router->get('health','Servercontroller@health');
            $router->get('versiontest','Servercontroller@versiontest');
        });


        $router->group(['prefix' => 'weather'], function (Router $router) {
            $router->get('test','Servercontroller@test');
            $router->get('city/{city}/current', 'Genaratequery@current');
            //$router->get('city/{city}/all', 'Genaratequeryr@all');

        });

    });

});


