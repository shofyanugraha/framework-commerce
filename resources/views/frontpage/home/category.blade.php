@extends('frontpage/layouts/main')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('plugins/layerslider/css/layerslider.css') }}" type="text/css">
@endsection
@section('content')
<div class="main-content section">
	<div class="container">
		<div class="row">
			<div class="col-md-3 category-widget">
				@foreach($cat as $ca)
                     <h4>{{ $ca->name}}</h4>
                     <ul class="nav nav-pills nav-stacked">
                        @foreach($ca->children as $child)
                        <li class="{{ ($category->id == $child->id ? 'active' : '' )}}" role="presentation"><a  href="{{ url('/category/'.$ca->slug.'/'.$child->slug) }}">{{ $child->name }}</a></li>
                        @endforeach
                    </ul>
                    </optgroup>
                @endforeach
			</div>
			<div class="col-md-9">
				<h3 class="sc-title">{{ $category->name}}</h3>
				<div class="row product-holder">
					@if($latest)
					@forelse($latest->data as $product)
						<div class="col-md-3 col-xs-6">
							<div class="product text-center">

								<div class="product-image">

									<a href="{{ url($product->slug) }}"><img src="{{ isset($product->details[0]->front_image) ? $product->details[0]->front_image->item->thumb : '' }}" class="img-responsive"></a>
								</div>
								<div class="product-title h4"><a href="{{ $product->slug }}">{{ $product->name}}</a></div>
								<div class="product-price">Rp {{ isset($product->details[0]->sale_price) ? number_format($product->details[0]->sale_price, 0, ',', '.') : '' }}
								@if($product->details[0]->display_price > $product->details[0]->sale_price)
	                                <span class="displayPrice">Rp {{ number_format($product->details[0]->display_price, 0, ',', '.') }}</span>
	                            @endif
		                        </div>
							</div>
						</div>
					@empty
						<div class="col-md-12 text-center">
							No Product
						</div>
					@endforelse
					@endif
				</div>
			</div>
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