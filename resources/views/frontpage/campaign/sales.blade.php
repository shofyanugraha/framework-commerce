@extends('frontpage/layouts/sale')
@section('stylesheet')
@endsection

@section('meta')
    <meta property="og:title" content="{{ $data->name }}"/>
    <meta property="og:url" content="{{ url($data->slug) }}"/>
    <meta property="og:site_name" content="Calcio Outfit"/>
    <meta property="og:type" content="product"/>
    <meta property="og:image" content="{{ $data->details[0]->front_image->item->thumb }}">
    <meta property="og:description" content="Limited Edition - {{ $data->name }}. {{ url($data->slug) }}">
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div id="sale">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="image-preview-buttons">
                                
                                <a class="active front" data-image="{{ json_encode($data->details[0]->front_image->item) }}" href="#">
                                    <img src="{{ $data->details[0]->front_image->item->thumb }}" alt="" class="img-responsive"/>
                                </a>
                                @if(isset($data->details[0]->back_image->item))
                                <a class="back" data-image="{{ json_encode($data->details[0]->back_image->item) }}" href="#">
                                    <img src="{{ $data->details[0]->back_image->item->thumb }}" alt="" class="img-responsive"/>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-10">
                            <div class="image-preview">
                                <div class="preview-zoom">
                                    <a href="{{ $data->details[0]->front_image->item->medium}}">
                                        <img src="{{ $data->details[0]->front_image->item->medium}}" class="zoom img-responsive">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    @if($data->status->number != 0)
                    <form  method="post" id="product-form">
                        <input type="hidden" name="product_name" value="{{ $data->name }}">
                        <input type="hidden" name="price" value="{{ $data->details[0]->sale_price }}">
                        <input type="hidden" name="weight" value="{{ $data->details[0]->weight }}">
                        <input type="hidden" name="additional_cost" value="0">
                        <input type="hidden" name="front_image" value="">
                        <input type="hidden" name="back_image" value="">
                        <input type="hidden" name="qty" value="1">
                        <div class="product-description">
                            <h2 class="title">{{ $data->name }}</h2>
                            <p class="price"><span class="priceformat">{{ $data->details[0]->sale_price }}</span> 
                                @if($data->details[0]->display_price > $data->details[0]->sale_price)
                                <span class="priceformat displayPrice">{{ $data->details[0]->display_price}}</span>
                                @endif
                            </p>
                                <div class="color-holder clearfix">
                                    <label>Pilih Warna</label><br/>
                                    @foreach($data->details as $detail)
                                    <span>
                                        <input type="radio" name="product_id" class="color-select" id="item-color-{{$detail->id}}" value="{{ $detail->id }}">

                                        <label class="select-color" data-price="{{ $detail->sale_price }}" data-back="{{ isset($detail->back_image->item) ? json_encode($detail->back_image->item) : '' }}" data-front="{{ json_encode($detail->front_image->item) }}"  for="item-color-{{$detail->id}}" style="background:{{$detail->color->hex}}"></label>
                                    </span>
                                    @endforeach
                                    <p class="validation error color"></p>
                                </div>
                                <div class="size-holder">
                                    <label>Pilih Ukuran</label><br/>
                                    <input type="hidden" name="size">
                                        @foreach($data->details[0]->size as $size)
                                            <span>
                                                <input type="radio" name="size_id" class="size-select" id="item-size-{{$size->id}}" value="{{ $size->id}}">
                                                <label data-additional="{{$size->additional_cost}}" class="select-size" for="item-size-{{$size->id}}">{{ $size->name }}</label>
                                            </span>
                                        @endforeach
                                    <p class="validation error size_id"></p>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-danger buy-button hidden-sm hidden-xs" id="btn-atc">
                            <i class="fa fa-shopping-cart"></i> Beli Sekarang
                        </button>
                    </form>
                    @else
                    <h2 class="title">{{ $data->name }}</h2>
                    @endif
                    <div class="countdown-holder">
                        @if($data->status->number != 0)
                        <h4 class="text-center">Penawaran Berakhir Dalam</h4>
                        <ul class="countdown">
                            <li> <span class="days">00</span>
                                <p class="days_ref">Hari</p>
                            </li>
                            <li class="seperator"></li>
                            <li> <span class="hours">00</span>
                                <p class="hours_ref">Jam</p>
                            </li>
                            <li class="seperator"></li>
                            <li> <span class="minutes">00</span>
                                <p class="minutes_ref">Menit</p>
                            </li>
                            <li class="seperator"></li>
                            <li> <span class="seconds">00</span>
                                <p class="seconds_ref">Detik</p>
                            </li>
                        </ul>
                        @else
                            <h4 class="text-center">Penawaran Telah Berakhir</h4>
                        @endif
                    </div>


                </div>
            </div>

        </div>
    </div>

</div>
<div class="separator">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-left">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" style="float: left">
                        <li class="bg-desc active" role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                <i class="fa fa-align-center"></i>
                                <span>Deskripsi</span>
                            </a>
                        </li>
                        <li class="bg-wa hidden-sm hidden-xs">
                            @php
                                if($res = preg_match('/^(0)[0-9]{9,11}$/',$data->whatsapp)){
                                    $res = '62'.substr($data->whatsapp, 1);
                                }elseif($res = preg_match('/^(\+?62)[0-9]{9,11}$/',$data->whatsapp)){
                                    $res = substr($data->whatsapp, 1);
                                } else {
                                    $res = $data->whatsapp;
                                }
                            @endphp
                            <a href="https://api.whatsapp.com/send?phone={{ $res }}&text=Saya tertarik dengan Produk {{ $data->name }}" target="_blank" class="chatToWA">
                                <i class="fa fa-whatsapp"></i>
                                <span>Chat Sekarang</span>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="description">
                    @markdown($data->description)
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-muted">
                <h5>Informasi Pengiriman</h5>
                <p>Barang akan diproduksi selambat-lambatnya 3-4 minggu setelah masa pre-order selesai, dan pengiriman barang dilaksanakan 1-2 hari dari proses produksi selesai</p>
            </div>
        </div>
    </div>
</div>
@if($data->status->number !=0)
<div class="fixed hidden-md hidden-lg" style="
    position: fixed; 
    bottom: 0;
    left: 0;
    right: 0;;
    width: 100%;
  ">
    <div class="col-xs-6" style="padding:0">
        <a class="btn btn-block btn-danger add2cartMobile">
            <i class="fa fa-shopping-cart"></i>
            Beli Sekarang
        </a>
    </div>
    <div class="col-xs-6"  style="padding:0">
        <a class="btn btn-block btn-success chatToWAMobile">
            <i class="fa fa-whatsapp"></i>
            Chat Sekarang
        </a>
    </div>
</div>
@endif
@endsection

@section('scripts')
    <script>
        window._storage = Storages.localStorage;
        $(document).ready(function() {

            var pixel = window._storage.get("pixel-{{ base64_encode($data->id)  }}");
            window.pixelData = {};
            window.pixelData.id = '{{ $data->pixel }}';
            window.pixelData.slug = '{{ $data->slug }}';
            window.pixelData.name = '{{ $data->name }}';

            if (pixel === undefined || pixel === null){
                window._storage.set("pixel-{{ base64_encode($data->id)  }}", window.pixelData);
            }

            if (typeof facebook != 'undefined') {
                facebook.createEvent(window.pixelData.id,'PageView', { 'campaign_url' : window.pixelData.slug, 'content_name': window.pixelData.name });
                facebook.createEvent(window.pixelData.id,'ViewContent', { 'campaign_url' : window.pixelData.slug,'content_name': window.pixelData.name  });
            }


            loadCart();

            $('.btnCheckout').attr('href','{{ url('/checkout/'.base64_encode($data->id))  }}')
            $('.countdown').downCount({
                date: '{{ \Carbon\Carbon::createFromFormat('d-m-Y', $data->end_date)->format('m/d/Y') }} 23:59:59',
                offset: 7
            });

            $('.zoom').magnify();
            $('.priceformat').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });


            $('#product-form').submit(function(e) {
                e.preventDefault();
                if (typeof facebook != 'undefined') {
                    facebook.createEvent(window.pixelData.id,'AddToCart', { 'campaign_url' : window.pixelData.slug, 'content_name': window.pixelData.name });
                }

                $('.validation.size_id').html('');
                $('.validation.color').html('');
                var validation = true;
                if($('input[name=size_id]:checked').length<=0)
                {
                    $('.validation.size_id').html("Ukuran Belum Dipilih");
                    validation = false;
                }
                if($('input[name=product_id]:checked').length<=0)
                {
                    $('.validation.color').html("Warna Belum Dipilih");
                    validation = false;
                }

                if(validation) {
                    var data = $(this).serializeObject();
                    data.key = data.product_id + '-' + data.size_id;
                    var localCart = window._storage.get("item-{{ base64_encode($data->id)  }}");

                    if(localCart === undefined || localCart === null) {
                        cart = [];
                        cart.push(data);
                    } else {
                        cart = localCart;
                        window.tempItem = [];
                        window.updateItem = [];

                        $.each(cart, function(keyCart, valCart) {
                            console.log(valCart.key !== data.key);
                            if (valCart.key !== data.key){
                                window.tempItem.push(valCart);
                            } else {
                                window.updateItem.push(valCart);
                            }
                        });


                        if(window.updateItem.length > 0) {
                            window.updateItem[0].qty = (parseInt(data.qty) + parseInt(window.updateItem[0].qty));
                            window.tempItem.push(window.updateItem[0]);
                            cart = window.tempItem;
                        } else {
                            cart.push(data);
                        }

                    }

                    window._storage.set("item-{{ base64_encode($data->id)  }}", cart);

                    loadCart();

                    $('.cart-menu a').trigger('click');
                }
            });


            $('.select-color').click(function() {
                var frontImage = JSON.parse($(this).attr('data-front'));
                var backImage = JSON.parse($(this).attr('data-back'));
                var displayedPrice = parseInt($(this).attr('data-price')) + parseInt($('input[name=additional_cost]').val());

                $('.price').html(displayedPrice);
                $('input[name=price]').val($(this).attr('data-price'));
                $('input[name=front_image]').val(frontImage.thumb);
                $('input[name=back_image]').val(backImage.thumb);
                $('.zoom').attr('src', frontImage.medium);
                $('.preview-zoom').attr('href', frontImage.medium);
                $('.magnify-lens').css({backgroundImage: 'url('+ frontImage.medium+')'});
                $('.image-preview-buttons a').removeClass('active');
                $('.image-preview-buttons a.front').addClass('active');
                $('.image-preview-buttons a.front').attr('data-image', $(this).attr('data-front'));
                $('.image-preview-buttons a.front img').attr('src', frontImage.thumb);
                $('.image-preview-buttons a.back').attr('data-image', $(this).attr('data-back'));
                $('.image-preview-buttons a.back img').attr('src', backImage.thumb);

                $('.priceformat').priceFormat({
                    prefix: 'Rp ',
                    centsLimit: 0,
                    thousandsSeparator: '.'
                });
            });
            $(document).on('click', '.image-preview-buttons a', function(e) {
                e.preventDefault();
                var image = JSON.parse($(this).attr('data-image'));
                console.log(image);
                $('.image-preview-buttons a').removeClass('active');
                $(this).addClass('active');
                $('img.zoom').attr('src', image.medium);
                $('.preview-zoom').attr('href', image.medium);
                $('.magnify-lens').css({backgroundImage: 'url('+ image.medium+')'});

            });
            $('.select-size').click(function() {
                var displayedPrice = parseInt($(this).attr('data-additional')) + parseInt($('input[name=price]').val());
                $('input[name=additional_cost]').val(parseInt($(this).attr('data-additional')));
                $('input[name=size]').val($(this).html());
                $('.price').html(displayedPrice);


                $('.priceformat').priceFormat({
                    prefix: 'Rp ',
                    centsLimit: 0,
                    thousandsSeparator: '.'
                });
            });
            $('.add2cartMobile').click(function(e){
                e.preventDefault();
                $('#product-form').trigger('submit');
            });

            $('.chatToWAMobile').click(function(e){
                e.preventDefault();
                var ahref = $('.chatToWA').attr('href');
                window.location.href = ahref;
            });
        });

        var loadCart = function() {
            var cart = window._storage.get("item-{{ base64_encode($data->id)  }}");
            var timeframe = window._storage.get("timeframe-{{ base64_encode($data->id)  }}");
            var timeNow = (new Date()).getTime();

            if ((timeframe === undefined || timeframe === null) || (timeframe-timeNow) > 1000 * 60 * 60 * 3) {
                window._storage.remove("item-{{ base64_encode($data->id)  }}");
                window._storage.set("timeframe-{{ base64_encode($data->id)  }}", timeNow);
            }
            if (cart !== undefined && cart !== null) {

                var total = {};
                total.qty = 0;
                total.price = 0;
                var holder = $('.cart-holder-item');
                holder.closest('tbody').html('');
                $.each(cart, function(key, val) {

                    var row = $('<tr></tr>').attr('id', 'rowItem' + val.key);
                    var qtyInput = $('<input/>').attr('type','text').attr('name', 'qty['+ key+']' ).attr('data-item-id', val.id).attr('id', 'inputItem' + val.key).addClass('form-control inputItem').val(val.qty).attr('onblur', 'blurQty(\''+ val.key + '\')').attr('onkeyup', 'updateQty(\''+ val.key + '\')').attr('pattern','[0-9]');
                    var frontImage= $('<img/>').attr('src',val.front_image).css('width','40px');
                    var backImage= $('<img/>').attr('src',val.back_image).css('width','40px');
                    var productName = val.product_name;
                    $('<td></td>').append(frontImage).append(backImage).appendTo(row);
                    $('<td></td>').html(productName).appendTo(row);
                    $('<td></td>').html(val.size.toUpperCase()).appendTo(row);
                    $('<td></td>').append(qtyInput).appendTo(row);
                    var price = (parseInt(val.price) + parseInt(val.additional_cost)) * parseInt(val.qty);
                    $('<td></td>').text(price).attr('id', 'priceItem' + val.key).addClass('priceformat').appendTo(row);
                    var buttonDelete = $('<a></a>').addClass('remove-item').append($('<i></i>').addClass('fa fa-times')).attr('onclick', 'deleteItem(\''+ val.key + '\')').attr('data-toggle','tooltip').attr('data-placement','top').attr('title', 'Hapus barang');;
                    $('<td></td>').append(buttonDelete).appendTo(row);

                    var totalPrice = parseInt(val.qty) * (parseInt(val.price) + parseInt(val.additional_cost));
                    holder.append(row);
                    total.qty+= parseInt(val.qty);
                    total.price+= parseInt(totalPrice);
                });

                if ($('.cart-items').css('display') == 'none') {

                    $('.cart-none').slideUp(500, function() {
                        $('.cart-items').slideDown(500);
                    });
                }

                $('#item-counter').html(total.qty);
                $('#totalPrice').html(total.price);
                //reformat currency
                $('.priceformat').priceFormat({
                    prefix: 'Rp ',
                    centsLimit: 0,
                    thousandsSeparator: '.'
                });
            } else {
                $('#item-counter').html(0);
                var holder = $('.cart-holder-item');
                holder.closest('tbody').html('');
                $('.cart-items').slideUp(500, function() {
                    $('.cart-none').slideDown(500);
                });
            }
        }

        var deleteItem = function(id) {
            var cart = window._storage.get("item-{{ base64_encode($data->id)  }}");


            window.updateItem = [];

            $.each(cart, function(keyCart, valCart) {
                if (valCart.key !== id){
                    window.updateItem.push(valCart);
                }
            });
            cart = window.updateItem;

            window._storage.set("item-{{ base64_encode($data->id)  }}", cart);

            loadCart();

        };

        var updateQty = function(id,keyItem) {
            var cart = window._storage.get("item-{{ base64_encode($data->id)  }}");

            var uitem = id.split('-');
            $('#inputItem'+id).val($('#inputItem'+id).val().replace(/[^0-9]/g, ''));

            if ($('#inputItem'+id).val() == 0 || $('#inputItem'+id).val() === '') {
                $('#inputItem'+id).val(1);
            }
            var uqty = $('#inputItem'+id).val();
            var key =  keyItem ? keyItem : id;

            window.updateItem = [];
            window.searchItem = [];
            $.each(cart, function(keyCart, valCart) {
                if (valCart.key !== key){
                    window.updateItem.push(valCart);
                }
                if (valCart.key === key){
                    window.searchItem.push(valCart);
                }
            });

            if(keyItem)
                window.searchItem[0].key = id;

            window.searchItem[0].qty = parseInt(uqty);
            window.searchItem[0].size_id = uitem[1];
            var uprice = (parseInt(window.searchItem[0].price) + parseInt(window.searchItem[0].additional_cost) ) * parseInt(window.searchItem[0].qty);

            $('#priceItem' + id).html(uprice);

            window.updateItem.push(window.searchItem[0]);
            cart = window.updateItem;

            var total = {};
            total.qty = 0;
            total.price = 0;

            $.each(cart, function(key, val) {
                var totalPrice = parseInt(val.qty) * (parseInt(val.price) + parseInt(val.additional_cost));
                total.qty+= parseInt(val.qty);
                total.price+= parseInt(totalPrice);
            });
            $('#item-counter').html(total.qty);
            $('#totalPrice').html(total.price);
            //reformat currency
            $('.priceformat').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });

            window._storage.set("item-{{ base64_encode($data->id)  }}", cart);
        };

        var deleteAll = function() {
            window._storage.remove("item-{{ base64_encode($data->id)  }}");

        }

        var blurQty = function(id) {
            var cart = window._storage.get("item-{{ base64_encode($data->id)  }}");

            var uitem = id.split('-');
            $('#inputItem'+id).val($('#inputItem'+id).val().replace(/[^0-9]/g, ''));

            if ($('#inputItem'+id).val() == 0 || $('#inputItem'+id).val() === '') {
                $('#inputItem'+id).val(1);
            }
            var uqty = $('#inputItem'+id).val();


            window.updateItem = [];
            window.searchItem = [];
            $.each(cart, function(keyCart, valCart) {

                if (valCart.key !== id){
                    window.updateItem.push(valCart);
                }

                if (valCart.key === id){
                    window.searchItem.push(valCart);
                }
            });


            window.searchItem[0].qty = parseInt(uqty);
            var uprice = (parseInt(window.searchItem[0].price) + parseInt(window.searchItem[0].additional_cost) ) * parseInt(window.searchItem[0].qty);

            $('#priceItem' + id).html(uprice);

            window.updateItem.push(window.searchItem[0]);
            cart = window.updateItem;

            var total = {};
            total.qty = 0;
            total.price = 0;

            $.each(cart, function(key, val) {
                var totalPrice = parseInt(val.qty) * (parseInt(val.price) + parseInt(val.additional_cost));
                total.qty+= parseInt(val.qty);
                total.price+= parseInt(totalPrice);
            });
            $('#item-counter').html(total.qty);
            $('#totalPrice').html(total.price);
            //reformat currency
            $('.priceformat').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });

            window._storage.set("item-{{ base64_encode($data->id)  }}", cart);


        };
    </script>
    
@endsection
