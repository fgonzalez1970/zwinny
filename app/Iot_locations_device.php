<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iot_locations_device extends Model
{
    protected $fillable = [
        'id_device','id_location','date_up','date_down','created_at','updated_at',
    ];
}
