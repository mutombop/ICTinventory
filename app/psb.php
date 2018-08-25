<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class psb extends Model
{
    //Below we define Psb relationaship with other models

    public function Assets(){
        return $this->hasMany('App\Asset');
    }
}
