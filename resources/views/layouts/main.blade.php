<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta Information -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title', config('app.name'))</title>

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

	<!-- CSS -->
	@yield('stylesheet', '')
	<link href="{{ mix('themes/default/css/app.css') }}" rel="stylesheet">
</head>
<body>
	<header>
		<div class="top-nav">
			<div class="container">
				<ul class="nav navbar-nav navbar-right">
					<li class="active">
						<a href="{{ url('/track-order') }}">Lacak Pesanan</a>
					</li>
					<li>
						<a href="{{ url('/confirmation-order') }}">Konfirmasi Pembayaran</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="navbar navbar-default main-menu">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="{{ asset('themes/default/images/logo.png') }}"></a>
				<ul class="nav navbar-nav main-nav">
					<li class="active">
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Clubs</a>
					</li>
					<li>
						<a href="#">Jackets</a>
					</li>
					<li>
						<a href="#">Shirts</a>
					</li>
					<li>
						<a href="#">Accesories</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right nav-user">
					<li>
						<a href="#"><i class="fa fa-user"></i> Login</a>
					</li>
					<li class="cart-menu">
						<a href="#"><i class="fa fa-shopping-bag"></i><span id="item-counter">0</span></a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	@yield('content')
	<footer>
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-md-3 widget">
						<h4 class="title">Calcio Outfit</h4>
						<ul class="fa-ul">
							<li><i class="fa fa-li fa-map-marker"></i> Jl. Kadungora No. 49<br/> Garut, Indonesia</li>
							<li><i class="fa fa-li fa-envelope"></i> <a href="#">helo@calciooutfit.com</a></li>
							<li><i class="fa fa-li fa-phone"></i> <a href="#">(022)2131231</a></li>
						</ul>
					</div>
					<div class="col-md-3 widget">
						<ul>
							<li><a href="#">Tentang Kami</a></li>
							<li><a href="#">Kontak</a></li>
							<li><a href="#">Lacak Pesanan</a></li>
							<li><a href="#">Konfirmasi Pembayaran</a></li>
						</ul>
					</div>
					<div class="col-md-3 widget">
						<h4 class="title">Newsletter</h4>
						<p>Daftarkan email kamu, untuk mendapatkan penawaran menarik dari <a class="red" href="{{ url('/') }}">calciootfit.com</a></p>
						<form class="form form-subscribe">
							<input type="email" name="email" placeholder="Enter Your Email" required="required">
							<button type="submit"><i class="fa fa-long-arrow-right"></i></button>
						</form>
					</div>
					<div class="col-md-3 widget">
						<h5 class="title">Jasa Pengiriman</h5>
						<p>
							<img src="{{ asset('/themes/default/images/jne.png') }}">
							<img src="{{ asset('/themes/default/images/tiki.png') }}">
							<img src="{{ asset('/themes/default/images/jnt.png') }}">
						</p>
						<h5 class="title">Bank Transfer</h5>
							<a href="#" class="bank"><img src="{{ asset('/themes/default/images/bank.png') }}"></a>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="clearfix">
					<div class="footer-left">
						All Rights Reserved &copy; Calcio Outfit 2017
					</div>
					<div class="footer-right">
						<ul class="social-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="separator"></li>
							<li><img src="{{ asset('themes/default/images/ssl.png') }}"></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
  <!-- JavaScript -->
  <script src="{{ mix('js/app.js') }}"></script>
  <!-- Scripts -->
  @yield('scripts', '')
</body>
</html>
