<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function weatherStat(){
        return $this->hasMany(WeatherStats::class);

    }
}
