<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assettype extends Model
{
    //Below we define Assettype relationships with other models

    public function Assetmodels(){
        return $this->hasMany('App\Assetmodel');
    }

    public function Assets(){
        return $this->hasMany('App\Asset');
    }
}
