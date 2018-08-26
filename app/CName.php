<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CName extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'CName_ID';

     /**
     * Get the zoneDetails that owns the CName.
     */
    public function zoneDetail(){
        return $this->belongsTo('App\ZoneDetail');
    }

    
}
