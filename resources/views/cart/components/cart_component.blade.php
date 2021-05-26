<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="shop__cart__table cart" data-url="{{route('deleteCart')}}">
                <table class="update_cart_url" data-url="{{route('updateCart')}}">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $total=0;
                    @endphp

                    @if(Session::has('cart'))
                        @foreach($carts as $id => $cartItem)

                            @php
                                $total+= $cartItem['price'] * $cartItem['quantity'];
                            @endphp

                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{config('app.base_url').$cartItem['image']}}" alt="1234"
                                         style="max-width: 10%; max-height: 10%;">
                                    <div class="cart__product__item__title">
                                        <h6> {{$cartItem['name']}}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">{{@number_format($cartItem['price'],0)}}</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="{{$cartItem['quantity']}}" class="quantity">
                                    </div>
                                </td>
                                <td class="cart__total">{{@number_format($cartItem['price'] * $cartItem['quantity'],0)}}
                                    VND
                                </td>
                                <td class="cart__update">
                                    <a href="" data-id="{{$id}}" class="icon_refresh cart_update"></a>
                                </td>
                                <td class="cart__close">
                                    <a href="" data-id="{{$id}}"
                                       class="icon_close cart_delete"></a>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3 offset-lg-9">
            <div class="cart__total__procced">
                <h6>Tổng <span>{{@number_format($total,0)}} VND</span></h6>

                @if(Auth::check() && Session::has('cart'))
                    <a href="{{route('checkout')}}" class="primary-btn">Thanh toán</a>
                @else
                    <a href="{{route('login')}}" class="primary-btn">Thanh toán</a>
                @endif

            </div>
        </div>

    </div>
</div>
