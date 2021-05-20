@extends('layouts.master')
@section('title')
    <title>Gio hang</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
    <script src="{{asset('home/process_cart.js')}}"></script>
@endsection

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        @include('cart.components.cart_component')
    </section>


@endsection
