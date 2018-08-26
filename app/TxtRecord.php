<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TxtRecord extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'TXT_ID';

     /**
     * Get the zoneDetails that owns the TxtRecord.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }
}
