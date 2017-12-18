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

    public function berangkat()
    {
    	return $this->belongsTo('App\Terminal', 'terminal_keberangkatan');
    }

    public function tujuan()
    {
    	return $this->belongsTo('App\Terminal', 'terminal_tujuan');
    }
}
