<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MxRecord extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'MX_ID';

     /**
     * Get the zoneDetails that owns the MxRecord.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }
}
