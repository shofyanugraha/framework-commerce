@extends('frontpage/layouts/success')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center" style="margin-bottom:40px;">Pembelian Berhasil</h1>
                <p>
                    Terima kasih, anda telah melakukan pemesanan
                </p>
                <p>Kode pesanan anda adalah <span class="txtRed">{{ $order->code }}</span></p>
                <table class="table">
                    <tr>
                        <td>Jumlah Pesanan</td>
                        <td>Rp. {{ number_format($order->order_total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Ongkos Kirim</td>
                        <td>Rp. {{ number_format($order->shipping_web, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Kode Unik</td>
                        <td>Rp. {{ number_format($order->unique_code , 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Total Pembayaran</td>

                        <td><span class="txtRed">Rp. {{ number_format($order->payment_total , 0, ',', '.') }}</span></td>
                    </tr>
                </table>
                <p>Silahkan lakukan pembayaran ke rekening <span class="txtRed">{{ strtoupper($bank->name) }} {{ $bank->account_number }}</span> atas nama <span class="txtRed">{{ $bank->account_holder }}</span></p>
                <p>Setelah melakukan pembayaran, silahkan lakukan <a class="btn btn-danger" href="{{ url('/confirmation') }} ">Konfirmasi</a></p>
                Untuk mengecek status pesanan anda, silahkan gunakan link <a target="_blank" href="{{ url('/track-order/'.$order->code) }} ">{{ url('/track-order/'.$order->code) }} </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection