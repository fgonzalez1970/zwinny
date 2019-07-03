<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Lead extends Model
{
	//protected $connection = 'tenant';

    protected $fillable = [
        'nombre_lead', 'apellido_lead', 'fecha_nac_lead', 'email_lead',
    ];
}
