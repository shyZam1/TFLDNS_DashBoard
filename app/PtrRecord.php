<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PtrRecord extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PTR_ID';

     /**
     * Get the zoneDetails that owns the PTRRecord.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }
}
