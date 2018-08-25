<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    //Below we define Po relationships with other models

    public function Section(){
        return $this->belongsTo('App\Section');
    }

    public function Assets(){
        return $this->hasMany('App\Asset');
    }
}
