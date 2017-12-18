@extends('layouts.master')

@section('title', 'Pilih Metode Pembayaran')

@section('content')
	<div class="allcontain">
		<div class="feturedsection">
        	<h1 class="text-center"><span class="bdots">&bullet;</span><span class="carstxt">Metode Pembayaran</span>&bullet;</h1>
    	</div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-md-offset-right-1">
				<hr>
				<h1>ATM <span><button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary pull-right">Pilih</button></h1>
				<p>Transfer ke rekening berikut:</p>
				<table>
					<tr>
						<td>Bank</td>
						<td>: Mandiri</td>
					</tr>
					<tr>
						<td>No. Rekening</td>
						<td>: 1241261856189</td>
					</tr>
					<tr>
						<td>Atas Nama</td>
						<td>: PT. Buson Makmur Jaya</td>
					</tr>
				</table>

				<hr>
				<h1>Indomaret <span><button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary pull-right">Pilih</button></span></h1>
				<p>Cukup datang aja ke Indomaret. Bilang "Mbak mau bayar buson". Lalu berikan ID Booking anda ke mbaknya</p>
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <div class="text-center">
		        	<h2>Kode Booking :</h2>
		        	<h1><span class="label label-success">{{ $id }}</span></h1>

		        	<p>Silahkan melakukan pembayaran sesuai petunjuk pada metode pembayaran yang anda pilih. Lalu upload foto bukti pembayaran anda di bawah ini:</p>
		        </div>
				<form action="/upload-bukti-bayar" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="file" name="bukti_bayar">
					<input type="hidden" name="id_pemesanan" value="{{ $id }}">
					<br>
					<button type="submit" class="btn btn-primary">Upload</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
@endsection