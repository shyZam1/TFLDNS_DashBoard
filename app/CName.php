<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CName extends Model
{
    public $timestamps = false;

     /**
     * Get the zoneDetails that owns the CName.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }

    
}
