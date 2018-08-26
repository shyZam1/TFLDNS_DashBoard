<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TldList extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'TopDomain_ID';

    public function zonelist (){
        return $this->hasMany('App\ZoneList');
    }
}
