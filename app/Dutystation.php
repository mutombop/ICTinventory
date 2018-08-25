<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dutystation extends Model
{
    //Below we define Dutystation relatinships with other models

    public function Holders(){
        return $this->hasMany('App\Holder');
    }
}
