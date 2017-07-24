@extends('frontpage/layouts/main')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('plugins/layerslider/css/layerslider.css') }}" type="text/css">
@endsection
@section('content')
    <div class="head-bg" style="background:url({{ asset('/images/about.jpg') }}); ">

    </div>
    <div class="main-content section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    <h1>Tentang Kami</h1>

                    <p>Calcio Outfit didirikan pada Tahun 2010, merupakan Clothing Brand dari Indonesia yang menggabungkan antara Football Culture (Kultur Sepakbola) dengan Fashion.</p>

                    <p>Fans Sepakbola di Indonesia sangat terkenal dengan Loyalitas & Fanatisme yang begitu tinggi. Untuk itu, Kami hadir dengan Passion yang sesuai, Product yang berkualitas, Perpaduan antara Casual Style + Sporty, Konsep Desain yang terinspirasi dari Passion setiap Kultur Klub.</p>

                    <p>Produk Iconic kami bisa anda dapatkan dalam bentuk T-Shirt, Jackets, Headwear dan Aksesories.</p>

                    <p>Tujuan Kami adalah membantu para Fans Fanatik Sepakbola di Indonesia yang ingin tampil beda dengan Fashion + Football Lifestyle ciri khas kami.</p>

                    <h3>OUR VALUES :</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-red">ICONIC PRODUCT</h4>
                            <p>Produk kami sangat khas, mungkin tidak akan anda temukan diluar sana.</p>

                            <h4 class="text-red">PROFESIONAL SERVICE</h4>
                            <p>Team kami siap membantu anda dengan pelayanan terbaik.</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-red">KUALITAS TERPERCAYA</h4>
                            <p>Produk yang berkualitas Premium dan menjadikan pengguna percaya diri.</p>

                            <h4 class="text-red">KEPUASAN PELANGGAN</h4>
                            <p>Kepuasan Pelanggan adalah Prioritas, Calcio Outfit akan selalu mengedepankan Kualitas.</p>
                        </div>
                    </div>
                </div>
            </div>
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