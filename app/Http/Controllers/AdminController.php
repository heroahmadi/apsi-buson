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

    public function getBuktiBayar()
    {
    	$id = request('id');
    	$url = Pemesanan::find($id)->bukti_bayar;
    	$url = '/image/bukti_bayar/'.$url;

    	return response()->json($url);
    }

    public function confirm()
    {
    	$id = request('id_to_confirm');
    	$pemesanan = Pemesanan::find($id);
    	$pemesanan->status_pemesanan = 2;
    	$pemesanan->save();

    	return redirect('/admin');
    }
}
