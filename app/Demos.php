<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Demos extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'demos';

}
