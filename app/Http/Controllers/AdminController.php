<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class AdminController extends Controller
{
    public function index()
    {
    	$pemesanan = Pemesanan::all()->sortBy('waktu_pesan');

    	return view('pages.admin', compact('pemesanan'));
    }
}
