<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MxRecord extends Model
{
    public $timestamps = false;

     /**
     * Get the zoneDetails that owns the MxRecord.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }
}
