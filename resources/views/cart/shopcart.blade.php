@extends('layouts.master')
@section('title')
    <title>Gio hang</title>
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
                        <a href=""><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cart__product__item">
                                    <img src="" alt="1234">
                                    <div class="cart__product__item__title">
                                        <h6>{{}}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">$ 150.0</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="cart__total">$ 300.0</td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-3 offset-lg-9">
                    <div class="cart__total__procced">
                        <h6>Tổng <span>$ 750.0</span></h6>
                        <a href="#" class="primary-btn">Thanh toán</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
