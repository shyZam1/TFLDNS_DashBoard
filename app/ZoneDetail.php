<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoneDetail extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ZoneDetail_ID';

    /**
     * Get the A records for the Zone Details.
     */
    public function aRecord(){

        return $this->hasMany('App\ARecord');
    }

    /**
     * Get the CName records for the Zone Details.
     */
    public function cName(){

        return $this->hasMany('App\CName');
    }

    /**
     * Get the PTR records for the Zone Details.
     */
    public function ptrRecords(){

        return $this->hasMany('App\PtrRecord');
    }

    /**
     * Get the Txt records for the Zone Details.
     */
    public function txtRecord(){

        return $this->hasMany('App\TxtRecord');
    }

    /**
     * Get the Mx records for the Zone Details.
     */
    public function mxRecord(){

        return $this->hasMany('App\MxRecord');
    }

    /**
     * Get the zoneDetails that associates with SOA.
     */
    public function soa(){
        return $this->hasOne('App\SoaRecord');
    }

     /**
     * Get the zoneDetails that owns the NameServer.
     */
    public function nameServer(){
        return $this->belongsTo('App\NameServer');
    }

     /**
     * Get the zoneDetails that owns the ZoneList.
     */
    public function zoneList(){
        return $this->belongsTo('App\ZoneList');
    }
}
