<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'lastname', 'avatar_photo', 'fecha_nac', 'status_civil_id', 'phone_fix', 'phone_cell',
    ];
}
