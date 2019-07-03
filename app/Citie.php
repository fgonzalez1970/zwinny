<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    protected $connection = 'mysql';

    public function showCityName($id)
    {
    	if ($id) {
        	$city = Citie::findOrFail($id)->name;
        	return $city;
    	} else {
    		return "";
    	}
    }
}
