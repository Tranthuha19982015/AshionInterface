@extends('layouts.master')
@section('title')
    <title>Chi tiet san pham</title>
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
                        <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Thông tin chi tiết sản phẩm > </span>
                        <span>{{$product->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="" alt="123">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img"
                                     src="{{config('app.base_url').$product->feature_image_path}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>

                        <div class="product__details__price">{{@number_format($product->price,0)}} VND</div>
                        <p>{{$product->content}}</p>

{{--                        Them vao gio hang--}}
                        <form action="{{route('cart')}}" method="post">
                            @csrf
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Số lượng:</span>
                                <div class="pro-qty">
                                    <input name="qty" type="text" value="1">
                                    <input name="id_hidden" type="hidden"
                                    value="{{$product->id}}">
                                </div>
                            </div>
                            <a href="" class="cart-btn">
                                <span class="icon_cart_alt"></span>
                                <button type="submit"> Thêm vào giỏ hàng</button>
                               </a>
                        </div>
                        </form>
                        {{-------------------------}}

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Tình trạng:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Kích thước:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Phí vận chuyển:</span>
                                    <p>30,000 VND</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Mô tả sản phẩm</h6>
                                <p>{{$product->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Sản phẩm tương tự</h5>
                    </div>
                </div>

                @foreach($product_similar as $productItem)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                             data-setbg="{{config('app.base_url').$productItem->feature_image_path}}">
                            <ul class="product__hover">
                                <li><a href="{{config('app.base_url').$productItem->feature_image_path}}"
                                       class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="{{route('product-details',['id'=>$product->id])}}">
                                        <span class="icon_info_alt"></span></a></li>
                                <li><a href="#"><span class="icon_cart_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$productItem->name}}</a></h6>
                            <div class="product__price">{{@number_format($productItem->price,0)}} VND</div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 text-center">
                    {{$product_similar->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection
