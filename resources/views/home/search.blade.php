@extends('layouts.master')
@section('title')
    <title>Tìm kiếm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4 style="margin-top: 50px;">Tìm thấy {{count($product)}} sản phẩm</h4>
                    </div>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach($product as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                 data-setbg="{{config('app.base_url').$product->feature_image_path}}">
                                <ul class="product__hover">
                                    <li><a href="{{config('app.base_url').$product->feature_image_path}}"
                                           class="image-popup"><span
                                                class="arrow_expand"></span></a></li>
                                    <li><a href="{{route('product-details',['id'=>$product->id])}}">
                                            <span class="icon_info_alt"></span></a></li>
                                    <li><a href="{{route('addTocart',['id'=>$product->id])}}"
                                           onclick="return alert('Thêm vào giỏ hàng thành công!')">
                                            <span class="icon_cart_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{$product->name}}</a></h6>
                                <div class="product__price">{{@number_format($product->price,0)}} VND</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
