<div class="header">
	<ul class="socialicon">
		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
	</ul>
	@if (auth()->check())
	<ul class="givusacall">
		<li>Halo, {{ auth()->user()->name }} !</li>
	</ul>
	<ul class="logreg">
		<li><a href="/logout">Logout </a> </li>
	</ul>
	@else
	<ul class="givusacall">
		
	</ul>
	<ul class="logreg">
		<li><a href="/login">Login </a> </li>
		<li><a href="/register"><span class="register">Register</span></a></li>
	@endif
	</ul>
</div>
<!-- Navbar Up -->
<nav class="topnavbar navbar-default topnav">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
				<span class="sr-only"> Toggle navigaion</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand logo" href="/"><img src="/image/logo1.png" alt="logo"></a>
		</div>	 
	</div>
	<div class="collapse navbar-collapse" id="upmenu">
		<ul class="nav navbar-nav" id="navbarontop">
			<li><a href="/">HOME</a> </li>
			<li><a href="/mytrip">DAFTAR PEMESANAN</a> </li>
			<li><a href="/statistic">STATISTIK</a> </li>
			<li><a href="/admin">ADMIN</a> </li>
			<li><a href="/traffic-feed">Traffic Feed</a> </li>
		</ul>
	</div>
</nav>