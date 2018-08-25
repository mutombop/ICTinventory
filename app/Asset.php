<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //Below we define Asset relationship with other models

    public function Holder(){
        return $this->belongsTo('App\Holder');
    }

    public function AssetType(){
        return $this->belongsTo('App\Assettype');
    }

    public function AssetModel(){
        return $this->belongsTo('App\Assetmodel');
    }

    public function Po(){
        return $this->belongsTo('App\Po');
    }

    public function Psb(){
        return $this->belongsTo('App\Psb');
    }
}
