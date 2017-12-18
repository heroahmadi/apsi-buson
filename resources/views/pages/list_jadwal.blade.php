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
	    					<p>Bus: <strong>{{ $t->bus->nama_bus }}</strong></p>
	    					<h4>Rp{{ $t->harga }}</h4>
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
	    					<button class="btn btn-info pull-right pesan_button" data-toggle="modal" data-target="#pesan" value="{{ $t->id }}">Pesan</button>
	    				</div>
	    			</div>
    			@endforeach
    			<hr>
    		</div>
    	</div>

    	<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="pesanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Isi Data Penumpang</h4>
					</div>

                    <form action="/pesan/book" method="post" class="form">
	                    <div class="modal-body">
	                        {{ csrf_field() }}
	                        <input type="hidden" name="idJadwal" id="idJadwal">
	                        <input type="hidden" name="tanggal" value="{{ $tanggal }}">
	                        <div class="form-group">
								<label for="nama">Nama Penumpang</label>
		                        <input type="text" name="nama" id="nama" class="form-control">
	                        </div>

	                        <div class="form-group">
								<label for="no_ktp">No. KTP Penumpang</label>
		                        <input type="text" name="no_ktp" id="no_ktp" class="form-control">
	                        </div>
	                    </div>

	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
	                        <button type="submit" class="btn btn-success">PESAN</button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script>
		$(".pesan_button").click(function(){
			$("#idJadwal").val($(this).val());
		});
	</script>
@endsection