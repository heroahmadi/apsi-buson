@extends('layouts.master')

@section('title', 'Detail Pemesanan')

@section('content')
	<div class="allcontain">
		<div class="feturedsection">
        	<h1 class="text-center"><span class="bdots">&bullet;</span><span class="carstxt">Daftar Pemesanan</span>&bullet;</h1>
    	</div>

    	<div class="row">
    		<div class="col-md-10 col-md-offset-1 col-md-offset-right-1">
    			@foreach ($mytrips as $trip)
	    			<hr>
	    			<div class="row">
	    				<div class="col-md-5">
	    					<p>Booking Code:</p>
	    					<h4>{{ $trip->id }}</h4>
                            <p>{{ \Carbon\Carbon::parse($trip->waktu_pesan)->format('l jS F Y') }} {{ \Carbon\Carbon::parse($trip->jadwal->waktu_berangkat)->format('h:m A') }}</p>
                            <p>
                            @if ($trip->status_pemesanan == 0)
                                <span class="label label-default">Not Paid</span>
                            @elseif ($trip->status_pemesanan == 1)
                                <span class="label label-info">Pending</span>
                            @elseif ($trip->status_pemesanan == 2)
                                <span class="label label-success">Paid</span>
                            @endif
                            </p>
	    				</div>

	    				<div class="col-md-2">
	    					<h3>{{ $trip->jadwal->berangkat->nama_terminal }}</h3>
	    				</div>

	    				<div class="col-md-2">
	    					<h1>→</h1>
	    				</div>

	    				<div class="col-md-2">
	    					<h3>{{ $trip->jadwal->tujuan->nama_terminal }}</h3>
	    				</div>

	    				<div class="col-md-1">
	    					<h1></h1>
	    					<button class="btn btn-info" data-toggle="modal" data-target="#detailPemesanan" id="detailPemesananButton" value="{{ $trip->id }}">Detail</button>
	    				</div>
	    			</div>
    			@endforeach
    			<hr>
    		</div>
    	</div>

    	<div class="modal fade" id="detailPemesanan" tabindex="-1" role="dialog" aria-labelledby="detailPemesananLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    	<div class="row">
                    		<div class="col-md-12">
                    			<p>Bus: <strong id="namaBus"></strong></p>
                    		</div>
                    	</div>
						<hr>
                    	<div class="row">
                    		<div class="col-md-12">
                    			<p>Booking Code: <span class="label label-success" id="bookingID"></span></p>
                    		</div>
                    	</div>
						<hr>
                    	<div class="row text-center">
                    		<div class="col-md-4">
                    			<h3 id="terminalAsal"></h3>
                    		</div>
                    		<div class="col-md-4">
                    			<h1>→</h1>
                    		</div>
                    		<div class="col-md-4">
                    			<h3 id="terminalTujuan"></h3>
                    		</div>
                    	</div>
						<hr>
                    	<div class="row">
                    		<div class="col-md-6">
	                    		<p>Nama:</p>
	                    		<h4 id="nama"></h4>
                    		</div>

                    		<div class="col-md-6">
	                    		<p>No KTP</p>
	                    		<h4 id="noKTP"></h4>
                    		</div>
                    	</div>
                    	<hr>
                    	<div class="row">
                    		<div class="col-md-6">
                    			<p>Tanggal Berngkat:</p>
                    			<h4 id="tanggalBerangkat"></h4>
                    		</div>
                    		<div class="col-md-6">
                    			<p>Jam:</p>
                    			<h4 id="jamBerangkat"></h4>
                    		</div>
                    	</div>
						<hr>
                    	<div class="row">
                    		<div class="col-md-12 text-center">
                    			<h2 id="status"></h2>
                    		</div>
                    	</div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection

@section('includes-scripts')
	@parent

	<script>
		$("#detailPemesananButton").click(function(){
			$.ajax({
                type: 'post',
                url: '/mytrip/get_detail',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': $(this).val()
                },
                error: function(){
                    console.log('error');
                },
                dataType: 'json',
                success: function(data){
                    $("#bookingID").html(data.id);
                    $("#namaBus").html(data.bus);
                    $("#terminalAsal").html(data.asal);
                    $("#terminalTujuan").html(data.tujuan);
                    $("#nama").html(data.nama_penumpang);
                    $("#noKTP").html(data.no_ktp_penumpang);
                    $("#tanggalBerangkat").html(data.tanggal);
                    $("#jamBerangkat").html(data.jam);
                    if(data.status_pemesanan == 0)
                    {
                        $("#status").html('<span class="label label-default">Belum Dibayar</span>');
                    }
                    else if(data.status_pemesanan == 1)
                    {
                        $("#status").html('<span class="label label-info">Pending</span>');
                    }
                    else if(data.status_pemesanan == 2)
                    {
                        $("#status").html('<span class="label label-success">Paid</span>');
                    }


                }
            });
		})
	</script>
@endsection