<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoaRecord extends Model
{
    public $timestamps = false;

     /**
     * Get the zoneDetails that owns the SoaRecord.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }
}
