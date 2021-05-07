@extends('layouts.master')
@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

{{--@section('js')--}}
{{--    <script src="{{asset('home/home.js')}}"></script>--}}
{{--@endsection--}}

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
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
                    <div class="row">

                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                         data-setbg="{{config('app.base_url').$product->feature_image_path}}">
                                        <ul class="product__hover">
                                            <li><a href="{{config('app.base_url').$product->feature_image_path}}"
                                                   class="image-popup"><span class="arrow_expand"></span></a>
                                            </li>
                                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
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
{{--                            <div class="pagination__option">--}}
{{--                                <a href="#">1</a>--}}
{{--                                <a href="#">2</a>--}}
{{--                                <a href="#">3</a>--}}
{{--                                <a href="#"><i class="fa fa-angle-right"></i></a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection






