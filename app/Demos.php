<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Demos extends Eloquent
{   //this model basically stores all the  analytics log files in mongodb
    protected $connection = 'mongodb';
    protected $collection = 'demos';

}
