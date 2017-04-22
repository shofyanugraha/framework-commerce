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
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
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
		
    	<nav class="navbar no-border-radius main-menu" id="main_navbar" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="{{ asset('img/logo.png') }}"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse main-nav" id="navbar-collapse-1">
					<!-- regular link -->
					<ul class="nav navbar-nav navbar-left main-nav">
						<!-- divider -->
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
						<li class="dropdown-full">	
        					<a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Accessories <i class="caret"></i></a>
							<div class="dropdown-menu no-shadow no-border-radius">
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
								<a href="#" class="col-xs-12 col-sm-6 col-md-3">Accessories</a>
							</div>
        				</li>
						<li class="divider"></li>
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
    	</nav>
		{{-- <div class="navbar navbar-default main-menu">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="{{ asset('img/logo.png') }}"></a>
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
						<a href="#">Accessories</a>
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
		</div> --}}
	</header>

    <main id="spark-app">
		@yield('content')
	</main>

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
							<img src="{{ asset('img/jne.png') }}">
							<img src="{{ asset('img/tiki.png') }}">
							<img src="{{ asset('img/jnt.png') }}">
						</p>
						<h5 class="title">Bank Transfer</h5>
							<a href="#" class="bank"><img src="{{ asset('img/bank.png') }}"></a>
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
							<li><img src="{{ asset('img/ssl.png') }}"></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
  <!-- JavaScript -->
	<script>
		window.Spark = <?php echo json_encode(array_merge(
			Spark::scriptVariables(), []
		)); ?>;
	</script>
	<script src="{{ mix('js/app.js') }}"></script>
  
	<script>
    	$( window ).load(function() {
    	    $(document).on('click', '.navbar .dropdown-menu', function(e) {e.stopPropagation();});
    	});
    	//Start Fix MegaNavbar on scroll page
    	var navHeight = $('#main_navbar').offset().top;
    	FixMegaNavbar(navHeight);
    	$(window).bind('scroll', function() {FixMegaNavbar(navHeight);});

    	function FixMegaNavbar(navHeight) {
    	    if (!$('#main_navbar').hasClass('navbar-fixed-bottom')) {
    	        if ($(window).scrollTop() > navHeight) {
    	            $('#main_navbar').addClass('navbar-fixed-top');
    	            $('#main_navbar .navbar-brand img').addClass('header-image-responsive');
    	            $('#main_navbar .navbar-brand').addClass('navbar-brand-fixed');
    	            $('body').css({'margin-top': $('#main_navbar').height()+'px'});
    	        }
    	        else {
    	            $('#main_navbar').removeClass('navbar-fixed-top');
    	            $('#main_navbar .navbar-brand img').removeClass('header-image-responsive');
    	            $('#main_navbar .navbar-brand').removeClass('navbar-brand-fixed');					
    	            $('body').css({'margin-top': ''});
    	        }
    	    }
    	}
		$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
			$('a[data-toggle="tab"]').each(function() {
						$(this).parent('li').removeClass('active');
			});
		})
		$('.carousel').carousel();
		
	</script>
  <!-- Scripts -->
  @yield('scripts', '')
</body>
</html>
