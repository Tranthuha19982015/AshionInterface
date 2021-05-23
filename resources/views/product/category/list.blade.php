@extends('layouts.master')
@section('title')
    <title>San pham</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><i class="icon_house"></i> Trang chủ</a>
                        <span>{{$category->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title">
                        <h4>{{$category->name}}</h4>
                    </div>
                    <div class="row">

                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-4">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                         data-setbg="{{config('app.base_url').$product->feature_image_path}}">
                                        <ul class="product__hover">
                                            <li><a href="{{config('app.base_url').$product->feature_image_path}}"
                                                   class="image-popup"><span class="arrow_expand"></span></a>
                                            </li>
{{--                                            {{route('product-details', ['id'=>id])}}--}}
                                            <li><a href="{{route('product-details',['id'=>$product->id])}}">
                                                    <span class="icon_info_alt"></span></a></li>
                                            <li><a href="{{route('addTocart',['id'=>$product->id])}}">
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

                        <div class="col-lg-12 text-center">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection






