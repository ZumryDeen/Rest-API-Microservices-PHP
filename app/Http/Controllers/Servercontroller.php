<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Servercontroller extends Controller
{
    public  function test(){
        return "Hello world";
    }

    public function health(){
        return $this->success();
    }

    public function versiontest() {
        if (file_exists(base_path('versionfille'))) {
            return $this->success(file_get_contents(base_path('versionfille')));
        }

        return $this->success('dev');
    }
}
