<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoneList extends Model
{   
    protected $table = 'zonelists';
    public $timestamps = false;
    // protected $primaryKey = 'Zone_ID';

    // /**
    //  * Get the top level domains for a zone.
    //  */
    // public function tldDomain (){
    //     return $this->belongsTo('App\TldList');
    // }

    // /**
    //  * Get the zoneList that associates with zone details.
    //  */
    // public function zoneDetail(){

    //     return $this->hasOne('App\ZoneDetail');
    // }
}
