@extends('layouts.master')

@section('title', 'Statistics')

@section('content')
  <div class="allcontain">
    <div class="feturedsection">
        <h1 class="text-center"><span class="bdots">&bullet;</span><span class="carstxt">Statistik</span>&bullet;</h1>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-md-offset-right-1 text-center">
        <h2>{{ $user }} akun terdaftar di <a href="/">buson.com</a></h2>
        <h2>Buson telah melayani {{ $pemesanan }} transaksi</h2>
        <h2>Sebanyak {{ $bus }} bus telah menjadi mitra kami</h2>
      </div>
    </div>
  </div>
@endsection