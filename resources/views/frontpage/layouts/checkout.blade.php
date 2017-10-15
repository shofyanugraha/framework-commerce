<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-104774095-1', 'auto');
        ga('send', 'pageview');

    </script>
    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,700,800" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    @yield('stylesheet', '')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    

            <div class="top-nav hidden-sm hidden-xs">
                <div class="container">
                        <ul class="nav navbar-nav navbar-right">
                                <li><a href="">&nbsp;</a></li>
                                <li class="active hidden-sm hidden-xs">
                                        <a href="{{ url('/track-order') }}">Lacak Pesanan</a>
                                </li>
                                <li class="hidden-sm hidden-xs">
                                        <a href="{{ url('/confirmation') }}">Konfirmasi Pembayaran</a>
                                </li>
                        </ul>
                </div>
        </div>
                  <!-- begin MegaNavbar-->
          <nav class="navbar navbar-blue no-border-radius no-shadow xs-height75 navbar-static-top " id="main_navbar" role="navigation">
                <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand_size_lg">
                                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand navbar-left" href="{{ url('/') }}">
                                    <img src="{{ asset('img/logo.png') }}" class="img-large hidden-sm hidden-xs">
                                    <img src="{{ asset('img/logo.png') }}" class="img-mobile hidden-md hidden-lg">
                                </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-brand_size_lg">
                                
                                <ul class="nav navbar-nav navbar-right">
                                                             <!-- divider -->
                                        <li class="active">
                                            <a href="#"><span class="badge red">1</span> Checkout</a>
                                        </li>
                                        <li class="separator"></li>
                                        <li>
                                            <a href="#"><span class="badge">2</span> Order Berhasil</a>
                                        </li>
                                </ul>
                            </ul>
                        </div>
                </div>
        </nav>

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
<div class="modal fade" tabindex="-1" role="dialog" id="modalCart">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Keranjang</h4>
            </div>
            <div class="modal-body">
                <div class="cart-items" style="display: none;">
                    <table class="table">
                        <thead>
                        <tr>
                            <td width="100"></td>
                            <td>Produk</td>
                            <td>Size</td>
                            <td width="60" class="text-center">Qty</td>
                            <td>Price</td>
                            <td><a href="#" class="remove-all-cart" onclick="deleteAll()"><i class="fa fa-times"></i></a></td>
                        </tr>
                        </thead>
                        <tbody class="cart-holder-item">

                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="4" class="text-right">Total</td>
                                <td class="priceformat" id="totalPrice"></td>
                            </tr>
                        </tfooter>
                    </table>
                </div>
                <div class="cart-none">
                    Belum ada barang di keranjang
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-info btnClose">Tambah Barang</a>
                <a href="/checkout" class="btn btn-primary btnCheckout">Lakukan Pembayarang</a>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->

<script src="{{ mix('js/customize.js') }}"></script>

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
    });
</script>
<!-- Scripts -->
@yield('scripts', '')
</body>
</html>
