@section('js')
    <script src="{{asset('home/home.js')}}"></script>
@endsection

<header class="header fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{asset('ashionshop/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a class="disabled_link" href="">Sản phẩm</a>

                            <ul class="dropdown">
                                @foreach($categorys as $category)
                                    <li class="dropdown-submenu">
                                        <a href="#category_{{$category->id}}">{{$category->name}}</a>
                                        {{--  if để kiểm tra xem danh mục đó có con hay k. nếu k có thì k hiện hộp--}}
                                        @if($category->categoryChild->count())
                                            <ul id="category_{{$category->id}}" class="dropdown-menu">
                                                @foreach($category->categoryChild as $categoryChildrent)
                                                    <li><a href="{{route('category',
                                                                    ['slug'=>$categoryChildrent->slug,
                                                                     'id'=>$categoryChildrent->id])}}">
                                                            {{$categoryChildrent->name}}
                                                        </a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                        </li>
                        {{--                        <li><a href="./shop.html">Shop</a></li>--}}
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @if(Auth::check())
                            <a href="">Chào bạn {{Auth::user()->name}}</a>
                            <a href="{{route('logout')}}">Đăng xuất</a>
                        @else
                        <a href="{{route('login')}}">Đăng nhập</a>
                        <a href="{{route('register')}}">Đăng ký</a>
                        @endif
                    </div>

                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="{{route('cart')}}"><span class="icon_cart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form action="{{route('search')}}" method="get" class="search-model-form">
                <input type="text" name="key" placeholder="Từ khóa tìm kiếm">
            </form>
        </div>
    </div>
</header>
