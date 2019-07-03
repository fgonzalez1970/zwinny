<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //
    protected $connection = 'mysql';

    public function showContinentName($id)
    {
    	if ($id) {
        	$continent = Continent::findOrFail($id)->name;
        	return $continent;
    	} else {
    		return "";
    	}
    }
}
