<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuslead extends Model
{
     protected $connection = 'tenant';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    
}