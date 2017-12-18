<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function metodeBayar($id)
    {
    	return view('pages.metode_bayar', compact('id'));
    }
}
