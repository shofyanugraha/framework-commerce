<ul class="nav navbar-nav navbar-right nav-user">
    <li class="cart-menu">
        <a href="#" data-toggle="modal" data-target="#modalCart"><i class="fa fa-shopping-bag"></i><span id="item-counter">0</span></a>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right main-nav">
    <!-- divider -->
    <li class="active">
        <a href="{{ url('/') }}">Home</a>
    </li>
    {{--<li>--}}
    {{--<a href="{{ url('/category/clubs') }}">Clubs</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">Jackets</a>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="#">Shirts</a>--}}
    {{--</li>--}}


    <li>
        <a href="{{ url('/track-order') }}">Lacak Pesanan</a>
    </li>
    <li>
        <a href="{{ url('/confirmation') }}">Konfirmasi Pembayaran</a>
    </li>
    <li class="divider"></li>
</ul>