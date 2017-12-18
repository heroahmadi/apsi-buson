<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\User;
use App\Bus;

class StatisticController extends Controller
{
    public function index()
    {
    	$user = User::count();
    	$pemesanan = Pemesanan::count();
    	$bus = Bus::count();

    	return view('pages.statistics', compact('user', 'pemesanan', 'bus'));
    }
}
