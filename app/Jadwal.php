<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function bus()
    {
    	return $this->belongsTo('App\Bus');
    }

    public function pemesanan()
    {
    	return $this->hasMany('App\Pemesanan');
    }
}
