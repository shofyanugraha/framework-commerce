@extends('layouts/main')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('themes/default/plugins/layerslider/css/layerslider.css') }}" type="text/css">
@endsection
@section('content')
<div id="slider">
	<div id="layerslider" style="width:1280px;height:550px;max-width: 1280px;">
		 <!-- First slide -->
	    <div class="ls-slide" data-ls="slidedelay:5000;transition2d:75,79;">
				<img src="images/blank.png" class="ls-bg" alt="Slide background"/>
				<img src="{{ asset('/images/madrid-front.png') }}" class="ls-l" style="top:80px;left:240px;font-weight: 300;font-size:40px;color:#000;white-space: nowrap;" data-ls="offsetxin:-100%;durationin:1000;easingin:easeOutBack;transformoriginin:left 0 0;"/>
				<h3 class="ls-l" style="top:150px;left:660px;font-weight: 300;font-size:40px;color:#000;white-space: nowrap;" data-ls="offsetxin:	100%;durationin:1000;easingin:easeOutBack;transformoriginin:right 100% 0;">DAPATKAN PRODUK</h1>
				<h3 class="ls-l" style="top:210px;left:660px;font-weight: 600;font-size:40px;color:#ec000f;white-space: nowrap;" data-ls="offsetxin:	100%;durationin:1000;easingin:easeOutBack;transformoriginin:right 100% 0;">WIND RUNNER</h1>
				<div href="#" class="ls-l hidden-sm hidden-xs" style="top:270px;left:660px;white-space: nowrap;" data-ls="offsetxin:	100%;durationin:1000;easingin:easeOutBack;transformoriginin:right 100% 0;"><a href="#" class="btn btn-primary btn-lg">SELENGKAPNYA</a></div>
			</div>
	</div>
</div>
<div class="main-content section">
	<div class="container">
		<h1 class="sc-title">New Arival</h1>
		<div class="row">
			@for($i=1; $i<=4; $i++)
			<div class="col-md-3">
				<div class="product text-center">
					<div class="product-image">
						<img src="{{ asset('/images/product/01.png') }}" class="img-responsive">
					</div>
					<div class="product-title h4">Chelsea Product</div>
					<div class="product-price">Rp. 150.000</div>
					<a class="btn  btn-primary">Lihat Detail</a>
				</div>
			</div>
			@endfor
		</div>
		<div class="row">
			@for($i=1; $i<=4; $i++)
			<div class="col-md-3">
				<div class="product text-center">
					<div class="product-image">
						<img src="{{ asset('/images/product/01.png') }}" class="img-responsive">
					</div>
					<div class="product-title h4">Chelsea Product</div>
					<div class="product-price">Rp. 150.000</div>
					<a class="btn  btn-primary">Lihat Detail</a>
				</div>
			</div>
			@endfor
		</div>
	</div>
</div>
@endsection
@section('scripts')
<!-- External libraries: jQuery & GreenSock -->
<script src="{{ asset('themes/default/plugins/layerslider/js/greensock.js') }}" type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="{{ asset('themes/default/plugins/layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
<script src="{{ asset('themes/default/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){
 
        // Calling LayerSlider on the target element
        $('#layerslider').layerSlider({
 			skinsPath: 'themes/default/plugins/layerslider/skins/',
            skin: 'v6',
        });
    });
</script>
@endsection