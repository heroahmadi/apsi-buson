<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use Carbon\Carbon;

class DetailPemesananController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$mytrips = Pemesanan::where('user_id', auth()->user()->id)->orderBy('waktu_pesan', 'desc')->get();

    	return view('pages.detail', compact('mytrips'));
    }

    public function getPesanan()
    {
    	$id = request('id');
    	$pesanan = Pemesanan::find($id);

    	$pesanan->bus = $pesanan->jadwal->bus->nama_bus;
    	$pesanan->asal = $pesanan->jadwal->berangkat->nama_terminal;
    	$pesanan->tujuan = $pesanan->jadwal->tujuan->nama_terminal;
    	$pesanan->tanggal = Carbon::parse($pesanan->waktu_pesan)->format('l jS F Y');
    	$pesanan->jam = Carbon::parse($pesanan->jadwal->waktu_berangkat)->format('h:m A');

    	return response()->json($pesanan);
    }
}
