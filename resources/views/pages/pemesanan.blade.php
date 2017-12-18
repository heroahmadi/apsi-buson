@extends('layouts.master')

@section('title', 'Pesan Tiket')

@section('content')
	<div class="allcontain">
		<div class="feturedsection">
	        <h1 class="text-center"><span class="bdots">&bullet;</span><span class="carstxt">Pesan Tiket</span>&bullet;</h1>
	    </div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-md-offset-right-1">
				<form action="/pesan/cari_tiket" method="post" class="form">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="tanggal">Tanggal Keberangkatan</label>
								<input type="date" name="tanggal" class="form-control">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="tanggal">Terminal Asal</label>
								<select name="asal" class="form-control">
									@foreach ($terminal as $t)
										<option value="{{ $t->id }}">{{ $t->nama_terminal }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="tanggal">Terminal Tujuan</label>
								<select name="tujuan" class="form-control">
									@foreach ($terminal as $t)
										<option value="{{ $t->id }}">{{ $t->nama_terminal }}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="col-md-3">
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-primary form-control">CARI</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
@endsection