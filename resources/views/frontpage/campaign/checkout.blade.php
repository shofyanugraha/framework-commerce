@extends('frontpage/layouts/checkout')

@section('stylesheet')
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="title">Checkout</h2>
                <form action="#" class="form" id="formCheckout">
                    <input type="hidden" name="courier">
                    <input type="hidden" name="service">
                    <input type="hidden" name="weight">
                    <input type="hidden" name="shipping_cost">
                    <h3>Informasi Pembeli</h3>
                    <div class="form-group">
                        <input required type="email" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input required type="text" id="phone" name="buyer_phone" class="form-control" placeholder="No. Handphone">
                    </div>
                    <h3>Informasi Penerima</h3>
                    <div class="form-group">
                        <input required type="text" id="name" name="receiver_name" class="form-control" placeholder="Nama Penerima">
                    </div>
                    <div class="form-group">
                        <input required type="text" id="phone-2" name="receiver_phone" class="form-control" placeholder="No. Handphone Penerima">
                    </div>
                    <div class="form-group">
                        <textarea required name="address" id="address" class="form-control" placeholder="Alamat lengkap"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <select required name="province_id" id="province" class="form-control">
                                    <option value=""  selected>Pilih Provinsi</option>
                                    @foreach($province as$pvc)
                                        <option value="{{ $pvc->id }}" >{{ $pvc->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select required name="city_id" id="city" class="form-control">
                                    <option value="" disabled="disabled"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <select required name="subdistrict_id" id="districtId" class="form-control">
                                    <option value="" disabled="disabled"></option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Kode Pos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="notes" id="note" class="form-control" placeholder="Catatan"></textarea>
                    </div>
                    <h5>Bank</h5>
                    <p>Silahkan pilih salah satu bank yang akan digunakan</p>
                    <div class="row bank-action">
                        @foreach($banks as $bank)
                        <div class="col-md-3">
                            <label for="bank-{{strtolower($bank->name)}}" class="btn-bank">{{$bank->name}}</label>
                            <div class="bank-option text-center">
                                <input id="bank-{{strtolower($bank->name)}}" class="bankoption" type="radio" name="bank_id" value="{{$bank->id}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-info btn-block" id="btnProceed">Proses Pesanan</button>
                </form>
            </div>

            <div class="col-md-6">
                <div class="checkout-cart panel panel-default">
                    <div class="panel-body">
                        <h2 class="bordered-title size-3"><span>Or</span>der Summary</h2>
                        <div class="cart-items" style="display: none;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td width="100"></td>
                                    <td>Produk</td>
                                    <td>Size</td>
                                    <td width="60" class="text-center">Qty</td>
                                    <td>Price</td>
                                </tr>
                                </thead>
                                <tbody class="cart-holder-item">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="checkout-total clearfix">
                            <div class="pull-left">Total Keranjang</div>
                            <div class="pull-right priceformat" id="totalPrice"></div>
                        </div>
                        <div class="checkout-shipping-cost clearfix">
                            <div class="pull-left">Ongkos Kirim</div>
                            <div class="pull-right priceformat" id="shippingCost">0</div>
                        </div>
                        <div class="checkout-total clearfix">
                            <div class="pull-left">Total</div>
                            <div class="pull-right priceformat" id="grandTotal"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        window._storage = Storages.localStorage;
        $(document).ready(function() {
            window.totalPrice = 0;
            window.shippingCost = 0;
            window.grandTotal = 0;
            loadCart();

            $('#province').change(function() {
                var province = $(this).val();
                $('.overlay').fadeIn();
                $.ajax({
                    url: app.host + 'master/city/'+province,
                    type: "GET",
                    success: function(result) {
                        $('.overlay').fadeOut();
                        if (result.meta.code === 200) {
                            var cityHolder = $('#city').html('').removeAttr('disabled').focus();
                            $('<option></option>').html('Pilih Kota').appendTo(cityHolder);
                            $.each(result.data, function(key, val) {
                                $('<option></option>').attr('value', val.id).html(val.name).appendTo(cityHolder);
                            });
                        } else {
                            var errorMsg = '';
                            if(result.error){
                                errorMsg += app.handleError(result.error);
                            }

                            alert('Tidak dapat mengambil data kota');
                        }

                    },
                    error: function(result) {
                        $('.overlay').fadeOut();
                        alert('Tidak dapat mengambil data kot');
                    }
                });
            });

            $('#province').change(function() {
                var province = $(this).val();
                $('.overlay').fadeIn();
                $.ajax({
                    url: app.host + 'master/city/'+province,
                    type: "GET",
                    success: function(result) {
                        $('.overlay').fadeOut();
                        if (result.meta.code === 200) {
                            var cityHolder = $('#city').html('').removeAttr('disabled').focus();
                            $('<option></option>').html('Pilih Kota').appendTo(cityHolder);
                            $.each(result.data, function(key, val) {
                                $('<option></option>').attr('value', val.id).html(val.name).appendTo(cityHolder);
                            });
                        } else {
                            var errorMsg = '';
                            if(result.error){
                                errorMsg += app.handleError(result.error);
                            }

                            alert('Tidak dapat mengambil data kota');
                        }

                    },
                    error: function(result) {
                        $('.overlay').fadeOut();
                        alert('Tidak dapat mengambil data kot');
                    }
                });
            });
            $('#city').change(function() {
                var id = $(this).val();
                $('.overlay').fadeIn();
                $.ajax({
                    url: app.host + 'master/subdistrict/'+id,
                    type: "GET",
                    success: function(result) {
                        $('.overlay').fadeOut();
                        if (result.meta.code === 200) {
                            var cityHolder = $('#districtId').html('').removeAttr('disabled').focus();
                            $('<option></option>').html('Pilih Kecamatan').appendTo(cityHolder);
                            $.each(result.data, function(key, val) {
                                $('<option></option>').attr('value', val.id).html(val.name).appendTo(cityHolder);
                            });
                        } else {
                            var errorMsg = '';
                            if(result.error){
                                errorMsg += app.handleError(result.error);
                            }

                            alert('Tidak dapat mengambil data kecamatan');
                        }

                    },
                    error: function(result) {
                        $('.overlay').fadeOut();
                        alert('Tidak dapat mengambil data kecamatan');
                    }
                });
            });

            $('#districtId').change(function() {
                var district = $(this).val();
                var city = $('#city').val();
                var districtHolder = $('#postal_code').removeAttr('disabled').focus();
                var cart = window._storage.get("item-{{ $code  }}");
                window.totalWeight = 0;
                $.each(cart, function(key, val){
                    var weight = val.weight * val.qty;
                    console.log(weight);
                    window.totalWeight += weight;
                });
                $('.overlay').fadeIn();
                $.ajax({
                    url: app.host + 'master/cost?district='+district+ '&city='+ city +'&weight='+window.totalWeight,
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        $('.overlay').fadeOut();
                        if (result.status === false) {
                            bootbox.alert('Mohon maaf daerah anda belum terjangkau oleh kurir kami');
                            $('#btnProceed').attr('disabled', 'disabled');
                        } else {
                            window.shippingCost = result.data.cost;
                            window.grandTotal = window.shippingCost + window.totalPrice;
                            $('#grandTotal').html(window.grandTotal);
                            $('#shippingCost').html(window.shippingCost);
                            $('input[name=shipping_cost]').val(window.shippingCost);
                            $('input[name=courier]').val(result.data.courier);
                            $('input[name=service]').val(result.data.service);
                            $('input[name=weight]').val(window.totalWeight);
                            $('#btnProceed').removeAttr('disabled');
                            $('.priceformat').priceFormat({
                                prefix: 'Rp ',
                                centsLimit: 0,
                                thousandsSeparator: '.'
                            });
                        }

                    },
                    error: function(result) {
                        $('.overlay').fadeOut();
                        bootbox.alert('Mohon maaf daerah anda belum terjangkau oleh kurir kami');
                    }
                });
            });

            $('#formCheckout').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    email: "required",
                    buyer_phone: "required",
                    receiver_name: "required",
                    receiver_phone: "required",
                    address: "required",
                    province_id: "required",
                    city_id: "required",
                    subdistrict_id: "required",
                    bank_id: "required"
                },
                submitHandler: function(form) {
                    $('.overlay').fadeIn();
                    var data = $('#formCheckout').serializeObject();
                    data.product = window._storage.get("item-{{ $code  }}");
                    axios.post(app.host + 'order', data, {
                        //headers: {
                          //  'Authorization': 'Bearer '
                        //}
                    }).then(function(response) {
                        $('.overlay').fadeOut();
                        if (response.data.meta.status == true) {
                            window._storage.remove("item-{{ $code  }}");
                            window._storage.remove("timeframe-{{ $code  }}");
                            window.location = '{{ url('/order-success') }}/'+response.data.data.code;
                        } else {
                            swal({
                                title: 'Failed!',
                                text: 'order failed!',
                                type: 'success'
                            }, function() {
                                window.location = '{{ url('/size') }}';
                            });
                        }
                    });

                    return false;
                }
            });
        });



        var loadCart = function() {
            var cart = window._storage.get("item-{{ $code  }}");
            var timeframe = window._storage.get("timeframe-{{ $code  }}");
            var timeNow = (new Date()).getTime();

            if ((timeframe === undefined || timeframe === null) || (timeframe-timeNow) > 1000 * 60 * 60 * 3) {
                window._storage.remove("item-{{ $code  }}");
                window._storage.set("timeframe-{{ $code  }}", timeNow);
            }
            if (cart !== undefined && cart !== null) {

                var total = {};
                total.qty = 0;
                total.price = 0;
                var holder = $('.cart-holder-item');
                holder.closest('tbody').html('');
                $.each(cart, function(key, val) {

                    var row = $('<tr></tr>').attr('id', 'rowItem' + val.key);
                    var frontImage= $('<img/>').attr('src',val.front_image).css('width','40px');
                    var backImage= $('<img/>').attr('src',val.back_image).css('width','40px');
                    var productName = val.product_name;
                    $('<td></td>').append(frontImage).append(backImage).appendTo(row);
                    $('<td></td>').html(productName).appendTo(row);
                    $('<td></td>').html(val.size.toUpperCase()).appendTo(row);
                    $('<td></td>').append(val.qty).appendTo(row);
                    var price = (parseInt(val.price) + parseInt(val.additional_cost)) * parseInt(val.qty);
                    $('<td></td>').text(price).attr('id', 'priceItem' + val.key).addClass('priceformat').appendTo(row);

                    var totalPrice = parseInt(val.qty) * (parseInt(val.price) + parseInt(val.additional_cost));
                    holder.append(row);
                    total.qty+= parseInt(val.qty);
                    total.price+= parseInt(totalPrice);
                });

                window.totalPrice = total.price;
                window.grandTotal = window.totalPrice + window.shippingCost;

                if ($('.cart-items').css('display') == 'none') {

                    $('.cart-none').slideUp(500, function() {
                        $('.cart-items').slideDown(500);
                    });
                }

                $('#item-counter').html(total.qty);
                $('#totalPrice').html(total.price);
                $('#grandTotal').html(window.grandTotal);
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

    </script>
@endsection