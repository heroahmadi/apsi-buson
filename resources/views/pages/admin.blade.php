@extends('layouts.master')

@section('title', 'Admin')

@section('content')
	<div class="allcontain">
		<div class="feturedsection">
        	<h1 class="text-center"><span class="bdots">&bullet;</span><span class="carstxt">ADMIN</span>&bullet;</h1>
    	</div>

    	<div class="row">
            <div class="col-md-10 col-md-offset-1 col-md-offset-right-1">
                <table class="table table-striped">
        			<thead>
        				<tr>
        					<td>ID Booking</td>
        					<td>Asal</td>
        					<td>Tujuan</td>
        					<td>Email</td>
        					<td>Waktu Pesan</td>
        					<td></td>
        				</tr>
        			</thead>


        			<tbody>
                        @foreach ($pemesanan as $p)
            				<tr>
            					<td>{{ $p->id }}</td>
            					<td>{{ $p->jadwal->berangkat->nama_terminal }}</td>
            					<td>{{ $p->jadwal->tujuan->nama_terminal }}</td>
            					<td>{{ $p->user->email }}</td>
            					<td>{{ $p->waktu_pesan }}</td>
                                @if ($p->status_pemesanan == 0)
                                    <td><button class="btn btn-sm btn-default disabled">Belum Dibayar</button></td>
                                @elseif ($p->status_pemesanan == 1)
                                    <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#buktiBayar" id="buktiBayarButton" value="{{ $p->id }}">Konfirmasi</button></td>
                                @elseif ($p->status_pemesanan == 2)
                                    <td><button class="btn btn-sm btn-primary disabled">Telah Dibayar</button></td>
                                @endif
            				</tr>
                        @endforeach
        			</tbody>
        		</table>
            </div>
    	</div>

        <div class="modal fade" id="buktiBayar" tabindex="-1" role="dialog" aria-labelledby="buktiBayarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <h2>Bukti Pembayaran: </h2>
                            <img src="" id="buktiBayarImg" width="100%">
                        </div>
                    </div>

                    <form action="/admin/confirm" method="post" id="confirmForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_to_confirm" value="" id="id_to_confirm">
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                        <button type="button" class="btn btn-success" id="confirm">KONFIRMASI</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection

@section('includes-scripts')
    @parent

    <script>
        $("#buktiBayarButton").click(function() {
            $("#id_to_confirm").val($(this).val());
            $.ajax({
                type: 'post',
                url: '/admin/get_bukti_bayar',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': $(this).val()
                },
                error: function(){
                    console.log('error');
                },
                dataType: 'json',
                success: function(url){
                    $("#buktiBayarImg").attr('src', url);
                }
            });
        });
    </script>

    <script>
        $("#confirm").click(function(){
            $("#confirmForm").submit();
        });
    </script>
@endsection