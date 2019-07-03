<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iot_dispositivos_tenant extends Model
{
    protected $fillable = [
        'id_dispositivo','id_tenant','date_up','date_down', 'created_at','updated_at',
    ];
}
