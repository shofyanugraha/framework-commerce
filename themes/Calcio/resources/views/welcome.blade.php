<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Calcio</title>

        <!-- Fonts -->
        <link href="{{ mix('css/theme.css', 'themes/calcio') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="navbar-brand mr-0 mr-lg-2" href="#"><img src="{{ asset('themes/calcio/images/logo.png') }}" alt=""></a>
                  <div class="d-flex">
                  <a class="nav-link  pr-2 text-white d-lg-none d-block" id="btn-cart" href="#" data-toggle="modal" data-target="#cart" style="position: relative;">
                    <span>
                    <i class="fas fa-user" ></i>
                    </span>
                  </a>
                  <a class="nav-link  pl-2 text-white d-lg-none d-block" id="btn-cart" href="#" data-toggle="modal" data-target="#cart" style="position: relative;">
                    <span>
                    <i class="fas fa-shopping-cart" ></i>
                    </span>
                  </a>
                  </div>
                  

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Italian</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">English</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Spanish</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Indonesia</a>
                      </li>
                    </ul>
                    <ul class="navbar-nav ml-auto  d-none d-lg-flex">
                      <li class="nav-item">
                          <a href="" class="nav-link"><i class="fa fa-user"></i></a>
                      </li>
                      <li class="nav-item">
                          <a href="" class="nav-link"><i class="fa fa-shopping-cart"></i></a>
                      </li>
                    </ul>
                  </div>
              </div>
            </nav>
        </header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('/themes/calcio/images/slider.jpg') }}" class="d-block w-100" alt="Slider 1">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('/themes/calcio/images/slider2.jpg') }}" class="d-block w-100" alt="Slider 2">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('/themes/calcio/images/slider3.jpg') }}" class="d-block w-100" alt="Slider 3">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="section value-index bg-primary py-4 text-light d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="media text-center text-lg-left d-block d-sm-flex">
                          <img src="{{ asset('themes/calcio/images/icon-product.svg') }}" class="mr-lg-3 mb-3 mb-lg-0" alt="...">
                          <div class="media-body">
                            <h5 class="my-0 text-uppercase text-warning">Berkualitas Tinggi</h5>
                            <span class="d-none d-md-block" style="font-size: .8rem;">Produk Bermutu Tinggi Berbahan Premium</span>
                          </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="media text-center text-lg-left d-block d-sm-flex">
                          <img src="{{ asset('themes/calcio/images/icon-id.svg') }}" class="mr-lg-3 mb-3 mb-lg-0" alt="...">
                          <div class="media-body">
                            <h5 class="my-0 text-uppercase text-warning">Original Made In Indonesia</h5>
                            <span class="d-none d-md-block" style="font-size: .8rem;">Produk Original dan 100% karya Anak Bangsa</span>
                          </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="media text-center text-lg-left  d-block d-sm-flex">
                          <img src="{{ asset('themes/calcio/images/icon-payment.svg') }}" class="mr-lg-3 mb-3 mb-lg-0" alt="...">
                          <div class="media-body">
                            <h5 class="my-0 text-uppercase text-warning">Pembayaran Aman</h5>
                            <span class="d-none d-md-block" style="font-size: .8rem;">Anda Berbelanja Kami Pastikan 100% Aman</span>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section product-list latest-product py-5">
            <div class="container">
                <div class="clearfix header-section text-uppercase mb-4" style="border-bottom: 1px solid #000;">
                    <div class="float-right">
                        <a href="#" class="btn btn-primary text-warning" style="border-radius: 0;">Get Offer</a>
                    </div>
                    <h4 class="header-title">
                        <span class="d-block" style="font-size: 1rem"></span>
                        Latest Product
                    </h4>
                </div>
                <div class="row">
                    @for($i=0; $i<4; $i++)
                    <div class="col-lg-3 col-6 product-item-holder mb-3">
                        <div class="product-item-image mb-2 ">
                            <a href="{{ url('/product/'.$i) }}"><img src="{{ asset('images/product.jpg') }}" class="img-fluid" alt="Product {{ $i }}"></a>
                        </div>
                        <div class="product-item-info text-center">
                            <h6 class="product-item-title my-0">Product {{ $i }}</h6>
                            <div class="product-item-price">
                                @if($i==1)
                                <s>Rp 200.000</s>
                                @endif
                                <strong>Rp 150.000</strong>
                            </div>

                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="section club-collection bg-primary">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 py-5 px-4 bg-white">
                        <div class="clearfix header-section mb-4 text-uppercase" style="border-bottom: 1px solid #000;">
                            <h4 class="header-title mb-0">
                                ENGLISH COLLECTION
                            </h4>
                            <p>Terbaru untuk fans liga Inggris</p>
                        </div>
                        
                          <div class="owl-carousel owl-theme" id="collection1">
                            @for($i=0; $i<3; $i++)
                            <div class="product-item-holder">
                                <div class="product-item-image mb-2 ">
                                    <a href="{{ url('/product/'.$i) }}"><img src="{{ asset('images/product.jpg') }}" class="img-fluid" alt="Product {{ $i }}"></a>
                                </div>
                                <div class="product-item-info text-center">
                                    <h6 class="product-item-title my-0">Product {{ $i }}</h6>
                                    <div class="product-item-price">
                                        @if($i==1)
                                        <s>Rp 200.000</s>
                                        @endif
                                        <strong>Rp 150.000</strong>
                                    </div>

                                </div>
                            </div>
                            @endfor
                          </div>
                    </div>
                    <div class="col-lg-6 " style="background: url({{ asset('/images/collection.png') }}); background-size: cover; position: relative; min-height: 200px">
                        <div class="collection-text" style="position: absolute;left: 5rem; bottom: 5rem">
                            <h2 class="text-warning text-uppercase">ENGLISH<br/>Collections</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section club-collection bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 " style="background: url({{ asset('/images/collection.png') }}); background-size: cover; position: relative; min-height: 200px">
                        <div class="collection-text" style="position: absolute;left: 5rem; bottom: 5rem">
                            <h2 class="text-warning text-uppercase">ITALIAN<br/>Collections</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 py-5 px-4 bg-white">
                        <div class="clearfix header-section mb-4 text-uppercase" style="border-bottom: 1px solid #000;">
                            <div class="float-right">
                                {{-- <a href="#" class="btn btn-primary">Get Offer</a> --}}
                            </div>
                            <h4 class="header-title mb-0">
                                ITALIAN COLLECTION
                            </h4>
                            <p>Terbaru untuk fans liga Italia</p>
                        </div>  

                          <div class="owl-carousel owl-theme" id="collection2">
                            @for($i=0; $i<3; $i++)
                            <div class=" product-item-holder">
                                <div class="product-item-image mb-2 ">
                                    <a href="{{ url('/product/'.$i) }}"><img src="{{ asset('images/product.jpg') }}" class="img-fluid" alt="Product {{ $i }}"></a>
                                </div>
                                <div class="product-item-info text-center">
                                    <h6 class="product-item-title my-0">Product {{ $i }}</h6>
                                    <div class="product-item-price">
                                        @if($i==1)
                                        <s>Rp 200.000</s>
                                        @endif
                                        <strong>Rp 150.000</strong>
                                    </div>

                                </div>
                            </div>
                            @endfor
                          </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="section value-index bg-primary py-4 text-light d-block d-lg-none">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="media text-center text-lg-left d-block d-sm-flex">
                          <img src="{{ asset('themes/calcio/images/icon-product.svg') }}" class="mr-lg-3 mb-3 mb-lg-0" alt="...">
                          <div class="media-body">
                            <h5 class="my-0 text-uppercase text-warning">Berkualitas Tinggi</h5>
                            <span class="d-none d-md-block" style="font-size: .8rem;">Produk Bermutu Tinggi Berbahan Premium</span>
                          </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="media text-center text-lg-left d-block d-sm-flex">
                          <img src="{{ asset('themes/calcio/images/icon-id.svg') }}" class="mr-lg-3 mb-3 mb-lg-0" alt="...">
                          <div class="media-body">
                            <h5 class="my-0 text-uppercase text-warning">Original Made In Indonesia</h5>
                            <span class="d-none d-md-block" style="font-size: .8rem;">Produk Original dan 100% karya Anak Bangsa</span>
                          </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="media text-center text-lg-left  d-block d-sm-flex">
                          <img src="{{ asset('themes/calcio/images/icon-payment.svg') }}" class="mr-lg-3 mb-3 mb-lg-0" alt="...">
                          <div class="media-body">
                            <h5 class="my-0 text-uppercase text-warning">Pembayaran Aman</h5>
                            <span class="d-none d-md-block" style="font-size: .8rem;">Anda Berbelanja Kami Pastikan 100% Aman</span>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 col-lg-4 footer-widget mb-5 mb-md-0">
                        <img class="img-fluid mb-3" src="{{ asset('themes/calcio/images/logo-dark.png') }}" alt="">
                        <ul class="nav flex-column text-uppercase">
                          <li class="nav-item">
                            <a class="p-0 py-1 nav-link" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="p-0 py-1 nav-link" href="#">OUR PRODUCT</a>
                          </li>
                          <li class="nav-item">
                            <a class="p-0 py-1 nav-link" href="#">ABOUT US</a>
                          </li>
                          <li class="nav-item">
                            <a class="p-0 py-1 nav-link" href="#">HOW TO ORDER</a>
                          </li>
                          <li class="nav-item">
                            <a class="p-0 py-1 nav-link" href="#">TERMS & CONDITIONS</a>
                          </li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 offset-lg-3 footer-widget">
                        <h5 class="mb-3 text-uppercase">Jasa Pengiriman</h5>
                        <div class="row">
                            <div class="col-6 mb-3 pr-1">
                                <img src="holder.js/90x50" class="img-fluid" alt="">
                            </div>
                            <div class="col-6 mb-3 pl-1">
                                <img src="holder.js/90x50"  class="img-fluid" alt="">
                            </div>
                            <div class="col-6 mb-3 pr-1">
                                <img src="holder.js/90x50"  class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 offset-lg-1 footer-widget">
                        <h5 class="mb-3 text-uppercase">PEMBAYARAN</h5>
                        <div class="row">
                            <div class="col-6 mb-3 pr-1">
                                <img src="holder.js/90x50" class="img-fluid" alt="">
                            </div>
                            <div class="col-6 mb-3 pl-1">
                                <img src="holder.js/90x50"  class="img-fluid" alt="">
                            </div>
                            <div class="col-6 mb-3 pr-1">
                                <img src="holder.js/90x50"  class="img-fluid" alt="">
                            </div>
                            <div class="col-6 mb-3 pl-1">
                                <img src="holder.js/90x50"  class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center text-md-left">&copy 2019 The Calcio ID. All Rights Reserved</p>
            </div>
        </footer>
        <script src="{{ mix('js/theme.js', 'themes/calcio') }}"></script>
        <script>
            WebFont.load({
              google: {
                families: ['Raleway:400,700,900']
              }
            });
            $(document).ready(function(){
               $('#collection1').owlCarousel({
                  items:2,
                  nav:true,
                  dots:false,
                  navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                  margin:30,
                   
                });
               $('#collection2').owlCarousel({
                  items:2,
                  nav:true,
                  dots:false,
                  navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                  margin:30,
                   
                });
            });
        </script>

    </body>
</html>