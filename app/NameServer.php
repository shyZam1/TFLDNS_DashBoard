<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameServer extends Model
{
    public $timestamps = false;

     /**
     * Get the zoneDetails that associates withthe NameServer.
     */
    public function zoneDetail(){
        return $this->hasOne('App\ZoneDetail');
    }
}
