@extends('frontpage/layouts/main')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('plugins/layerslider/css/layerslider.css') }}" type="text/css">
@endsection
@section('content')
<div id="slider">
	<div id="layerslider" style="width:1300px;height:550px;">
		 <!-- First slide -->
	    <div class="ls-slide" data-ls="slidedelay:5000;transition2d:all;">
	        <img src="images/slider/1.jpg" class="ls-bg" alt="Slide background"/>
		</div>
		<div class="ls-slide" data-ls="slidedelay:5000;transition2d:all;">
	        <img src="images/slider/2.jpg" class="ls-bg" alt="Slide background"/>
		</div>
		<div class="ls-slide" data-ls="slidedelay:5000;transition2d:all;">
	        <img src="images/slider/3.jpg" class="ls-bg" alt="Slide background"/>
		</div>
		<div class="ls-slide" data-ls="duration:4000;transition2d:11;kenburnsscale:1.2;">
			<img src="images/slider/video.jpg" class="ls-bg"/>
			<div style="top:0px;left:0px; right:0px; margin: auto;" class="ls-l" data-ls="durationin:500;durationout:400;parallaxlevel:0;"><iframe width="1300" height="550" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen data-src="https://www.youtube.com/embed/49hHw_vH8xI"></iframe></div>
		</div>
	</div>
</div>
<div class="main-content section">
	<div class="container">
		<h1 class="sc-title text-center">New Arrival</h1>
		<div class="row product-holder">
			@if($latest)
			@forelse($latest as $product)
				<div class="col-md-3 col-xs-6">
					<div class="product text-center">
						<div class="product-image">
							<a href="{{ $product->slug }}"><img src="{{ isset($product->details[0]->front_image) ? $product->details[0]->front_image->item->thumb : '' }}" class="img-responsive"></a>
						</div>
						<div class="product-title h4"><a href="{{ $product->slug }}">{{ $product->name}}</a></div>
						<div class="product-price">Rp {{ isset($product->details[0]->sale_price) ? number_format($product->details[0]->sale_price, 0, ',', '.') : '' }}</div>
					</div>
				</div>
			@empty
				<div class="col-md-12 text-center">
					No Product
				</div>
			@endforelse
			@endif
		</div>
		{{--<div class="row">--}}
			{{--<div class="col-md-2 col-md-offset-5">--}}
				{{--<a href="{{ url('/new-arrival') }}" class="btn btn-block btn-danger">Lainnya</a>--}}
			{{--</div>--}}
		{{--</div>--}}
	</div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('plugins/layerslider/js/greensock.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){
        $('#layerslider').layerSlider({
 			skinsPath: 'plugins/layerslider/skins/',
            skin: 'v6',
        });
    });
</script>
@endsection