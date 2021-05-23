@extends('layouts.master')
@section('title')
    <title>Thanh toán</title>
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
                        <a href="{{route('home')}}"><i class="icon_house"></i> Trang chủ</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"></h6>
                </div>
            </div>
            <form action="#" class="checkout__form" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Địa chỉ giao hàng</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Họ tên <span>*</span></p>
                                    <input type="text" required maxlength="30" minlength="2">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Số điện thoại <span>*</span></p>
                                    <input type="text" required maxlength="10" minlength="10">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Địa chỉ <span>*</span></p>
                                    <input type="text" placeholder="Địa chỉ giao hàng">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Ghi chú</p>
                                    <input type="text"
                                           placeholder="Lưu ý cho chủ cửa hàng...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Thông tin đơn hàng</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Sản phẩm</span>
                                        <span class="top__text__right">Giá</span>
                                    </li>

                                    @php
                                        $total=0;
                                    @endphp

                                    @if(Session::has('cart'))
                                        @foreach($carts as $id => $cartItem)
                                            @php
                                                $total+= $cartItem['price'] * $cartItem['quantity'];
                                            @endphp

                                            <li>{{$cartItem['name']}} x {{$cartItem['quantity']}}
                                                <span> {{@number_format($cartItem['price']*$cartItem['quantity'],0)}}</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Tổng tiền hàng <span>{{@number_format($total,0)}}</span></li>
                                    <li>Phí vận chuyển <span>30.000</span></li>
                                    <li>Tổng thanh toán <span>{{@number_format($total+30000,0)}}</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="check-payment">
                                    Cheque payment
                                    <input type="checkbox" id="check-payment">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
