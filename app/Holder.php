<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
    //Below we define Holder relationships with other models

    public function Assets(){
        return $this->hasMany('App\Asset');
    }

    public function Section(){
        return $this->belongsTo('App\Section');
    }

    public function Dutystation(){
        return $this->belongsTo('App\Dutystation');
    }

    //This function helps to return Holder fullName where needed

    public function getfullNameAttribute(){
        return $this->firstName . ' '. $this->lastName;
      }
}
