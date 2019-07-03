<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $connection = 'mysql';
    protected $table = 'countries';
    public function showCountryName($id)
    {
    	if ($id) {
        	$country = Country::findOrFail($id)->name;
        	return $country;
    	} else {
    		return "";
    	}
    }
}
