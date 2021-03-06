<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Pemesanan;
use App\Jadwal;
use App\Terminal;

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $terminal = Terminal::all();

        return view('pages.pemesanan', compact('terminal'));
    }

    public function cariTiket()
    {
        $tanggal = request('tanggal');
        $hari = Carbon::parse($tanggal)->dayOfWeek;
        $asal = request('asal');
        $tujuan = request('tujuan');
        $tanggal = Carbon::parse($tanggal);

        $tiket = Jadwal::where('hari_berangkat', $hari)->where('terminal_keberangkatan', $asal)->where('terminal_tujuan', $tujuan)->get()->sortBy('waktu_berangkat');

        return view('pages.list_jadwal', compact('tiket', 'tanggal'));
    }

    public function book()
    {
        $pemesanan = new Pemesanan;
        $pemesanan->jadwal_id = request('idJadwal');
        $pemesanan->user_id = auth()->user()->id;
        $pemesanan->waktu_pesan = request('tanggal');
        $pemesanan->status_pemesanan = 0;
        $pemesanan->nama_penumpang = request('nama');
        $pemesanan->no_ktp_penumpang = request('no_ktp');
        $pemesanan->save();

        return redirect('payment/'.$pemesanan->id);
    }

    public function metodeBayar($id)
    {
    	return view('pages.metode_bayar', compact('id'));
    }

    public function pay()
    {
    	$this->validate(request(), [
    		'bukti_bayar' => 'mimes:jpeg,png,jpg|max:2048'
    	]);

    	$id = request('id_pemesanan');
    	$file = request('bukti_bayar');

    	$filename = $id.'.'.$file->getClientOriginalExtension();
    	$file->move(base_path(). '/public/image/bukti_bayar/', $filename);

    	$pemesanan = Pemesanan::find($id);
    	$pemesanan->bukti_bayar = $filename;
        $pemesanan->status_pemesanan = 1;
    	$pemesanan->save();

    	return view('pages.upload_success');
    }
}
