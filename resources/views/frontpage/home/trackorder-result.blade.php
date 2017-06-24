@extends('frontpage/layouts/main')
@section('content')
    <div class="main-content section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-4">
                    <h4 style="margin-top: 0">Informasi Penerima</h4>
                    <div class="order-head">
                        <div class="row">
                            <div class="col-xs-1">
                                <i class="fa fa-3x fa-paste"></i>
                            </div>
                            <div class="col-xs-10">
                                <div class="order-num">
                                    <span class="order-number">{{ $order->code }}</span> - <span class="order-status">{{ $order->status->string }}</span>
                                </div>
                                <div class="order-meta">
                                    {{ date('d-m-Y h:i:s', strtotime($order->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buyer-info">
                        <table class="table">
                            <tbody class="table-no-border">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $order->receiver_name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $order->address}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td>Handphone</td>
                                <td>:</td>
                                <td>{{ $order->receiver_phone }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="item-detail">
                        <h4>Barang yang dipesan</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $detail)
                                <tr>
                                    <td>
                                        <img src="{{ $detail->front_image->item->thumb }}" width="50">
                                        <img src="{{ $detail->back_image->item->thumb }}" width="50">
                                        <span><a href="{{ url( $detail->product->slug ) }} target="_blank" title="{{ $detail->product->name }}">{{ $detail->product->name }}</a>
                                    </td>
                                    <td>{{ $detail->product_size[0]->name }}</td>
                                    <td>
                                        <span class="priceformat">{{ $detail->sale_price + $detail->product_size[0]->additional_cost }}</span>
                                    </td>
                                    <td>
                                        {{ $detail->pivot->quantity }}
                                    </td>

                                    <td>
                                        <span class="priceformat">{{ ($detail->sale_price + $detail->product_size[0]->additional_cost) * $detail->pivot->quantity }}</span>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="table-no-border">
                                <tr>
                                    <td colspan="4" class="text-right">Total Belanjaan</td>
                                    <td><span class="priceformat">{{ $order->order_total }}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Ongkir</td>
                                    <td><span class="priceformat">{{ $order->shipping_web}}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Kode Unik</td>
                                    <td class="priceformat">{{ $order->unique_code }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Grand Total</td>
                                    <td><span class="priceformat">{{ $order->payment_total }}</span></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <h4>Proses Pesanan</h4>
                    <div class="timeline timeline-line-dotted">
                        @foreach($histories as $history)
                        <span class="timeline-label">
                        </span>
                        <div class="timeline-item">
                            <div class="timeline-point timeline-point-success">
                            </div>
                            <div class="timeline-event">
                                <div class="timeline-heading">
                                    <h5>{{ $history->status->string }}</h5>
                                </div>
                                <div class="timeline-footer">
                                    <p class="text-muted">{{ date('d-m-Y h:i:s', strtotime($history->created_at)) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 class="text-left" style="margin-top:0">Lacak Pesanan</h4>
                            <p>Lacak Pesanan Anda</p>
                            <form class="form" id="form-tracker" method="post">
                                <div class="form-group ">
                                    <label for="order-number" class="sr-only">Nomor Order / Invoice</label>
                                    <input type="text" class="form-control" required="required" name="code" id="order-number" placeholder="Kode Pesanan">
                                </div>
                                <div>
                                    {!! Recaptcha::render() !!}
                                    <input type="text" class="hiddenRecaptcha required" style="visibility: hidden; height:1px; border:none" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                </div>
                                <button type="submit" class="btn btn-info disabled">Track Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.priceformat').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });
            $('#form-tracker').validate({
                rules: {
                    code: {
                        required: true,
                        minlength: 6
                    },
                    hiddenRecaptcha: {
                        required: function () {
                            if (grecaptcha.getResponse() == '') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                submitHandler: function(form) {
                    $('.overlay').fadeIn();
                    var data = $('#form-tracker').serializeObject();
                    data.hiddenRecaptcha = grecaptcha.getResponse();
                    axios.post(app.host + 'order/tracker', data, {
                        //headers: {
                        //  'Authorization': 'Bearer '
                        //}
                    }).then(function(response) {
                        if (response.data.meta.status == true) {
                            var $form=$(document.createElement('form')).css({display:'none'}).attr("method","POST").attr("action","{{ url('/track-order') }}/"+response.data.data.code);
                            $("body").append($form);
                            $form.submit();
                        } else {
                            swal({
                                title: 'Failed!',
                                text: 'order failed!',
                                type: 'success'
                            }, function() {
                            });
                        }
                    });

                    return false;
                }
            });
        });
    </script>
@endsection