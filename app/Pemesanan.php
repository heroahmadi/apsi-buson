<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function jadwal()
    {
    	return $this->belongsTo('App\Jadwal');
    }
}
