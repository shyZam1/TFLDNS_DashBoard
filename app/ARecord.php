<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARecord extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'A_ID';

    /**
     * Get the zoneDetails that owns the ARecord.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }
}
