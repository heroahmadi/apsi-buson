<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public function jadwal()
    {
    	return $this->hasMany('App\Jadwal');
    }
}
