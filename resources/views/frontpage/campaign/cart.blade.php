@extends('frontpage/layouts/main')

@section('stylesheet')
@endsection

@section('content')
<div class="section">
    <div class="container">
        <cart-preview></cart-preview>

        <h2 class="bordered-title size-3"><span>Pro</span>duk Terkait</h2>
        <product-item></product-item>
    </div>
</div>
@endsection

@section('scripts')
@endsection