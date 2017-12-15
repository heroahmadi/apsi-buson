<!doctype html>
<html>
<head>
	@include('includes.head')

	@section('includes-css')
		<link rel="stylesheet" type="text/css" href="{{ url('source/bootstrap-3.3.6-dist/css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('source/font-awesome-4.5.0/css/font-awesome.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('style/slider.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{ url('style/mystyle.css')}}">
	@show
</head>
<body>
<!-- Header -->
<div class="allcontain">
	@include('includes.topnavbar')
</div>
<!-- Content -->

@yield('content')

<div class="allcontain">
	@include('includes.footer')
</div>

	@section('includes-scripts')
		<script type="text/javascript" src="{{ url('source/bootstrap-3.3.6-dist/js/jquery.js')}}"></script>
		<script type="text/javascript" src="{{ url('source/bootstrap-3.3.6-dist/js/jquery.1.11.js')}}"></script>
		<script type="text/javascript" src="{{ url('source/bootstrap-3.3.6-dist/js/bootstrap.js')}}"></script>
		<script type="text/javascript" src="{{ url('source/js/isotope.js')}}"></script>
    	<script type="text/javascript" src="{{ url('source/js/myscript.js')}}"></script> 
	@show
</body>
</html>