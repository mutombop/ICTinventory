<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Asset extends Model implements Auditable
{
    //Below we define Asset relationship with other models

    use \OwenIt\Auditing\Auditable;

    public function Holder(){
        return $this->belongsTo('App\Holder');
    }

    public function Assettype(){
        return $this->belongsTo('App\Assettype');
    }

    public function Assetmodel(){
        return $this->belongsTo('App\Assetmodel');
    }

    public function Po(){
        return $this->belongsTo('App\Po');
    }

    public function Psb(){
        return $this->belongsTo('App\Psb');
    }
}
