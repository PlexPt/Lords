<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = ['xAxis', 'yAxis', 'terrain'];
}
