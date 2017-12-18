<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class PemesananController extends Controller
{
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
    	$file->move(base_path(). '/public/bukti_bayar/', $filename);

    	$pemesanan = Pemesanan::find($id);
    	$pemesanan->bukti_bayar = $filename;
    	$pemesanan->save();

    	return 'Sukses';
    }
}
