<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assetmodel extends Model
{
    //Below we define Assetmodel relationships with other models

    public function Assettype(){
        return $this->belongsTo('App\Assettype');
    }

    public function Assets(){
        return $this->hasMany('App\Asset');
    }
}
