<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //Below we define Section relationships with other models

    public function Pos(){
        return $this->hasMany('App\Po');
    }

    public function Holders(){
        return $this->hasMany('App\Holder');
    }
}
