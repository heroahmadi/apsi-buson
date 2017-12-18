@extends('layouts.master')

@section('title', 'Pesan Tiket')

@section('content')
	<div class="allcontain">
		<div class="row">
    		<div class="col-md-10 col-md-offset-1 col-md-offset-right-1">
    			<h3>Menampilkan tiket untuk {{ $tanggal->format('l\\, j F Y') }}</h3>
    		</div>
    	</div>
		<div class="row">
    		<div class="col-md-10 col-md-offset-1 col-md-offset-right-1">
    			@foreach ($tiket as $t)
	    			<hr>
	    			<div class="row">
	    				<div class="col-md-3">
	    					<p>Bus:</p>
	    					<h4><strong>{{ $t->bus->nama_bus }}</strong></h4>
                            <p>{{ \Carbon\Carbon::parse($t->waktu_berangkat)->format('h:m A') }}</p>
	    				</div>

	    				<div class="col-md-2">
	    					<h3>{{ $t->berangkat->nama_terminal }}</h3>
	    				</div>

	    				<div class="col-md-2">
	    					<h1>→</h1>
	    				</div>

	    				<div class="col-md-2">
	    					<h3>{{ $t->tujuan->nama_terminal }}</h3>
	    				</div>

	    				<div class="col-md-3">
	    					<h1></h1>
	    					<button class="btn btn-info pull-right" data-toggle="modal" data-target="#detailPemesanan" id="detailPemesananButton" value="{{ $t->id }}">Pesan</button>
	    				</div>
	    			</div>
    			@endforeach
    			<hr>
    		</div>
    	</div>
	</div>
@endsection