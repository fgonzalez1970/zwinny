<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $connection = 'mysql';

    public function showStateName($id)
    {
    	if ($id) {
        	$state = State::findOrFail($id)->name;
        	return $state;
    	} else {
    		return "";
    	}
    }
}
