<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lead_status extends Model
{
    //protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_lead', 'id_status', 'date_change','id_user',
    ];

    public $timestamps = false;
}
