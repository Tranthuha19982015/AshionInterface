<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

@yield('title')

<!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('ashionshop/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ashionshop/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ashionshop/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ashionshop/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ashionshop/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ashionshop/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ashionshop/css/style.css')}}" type="text/css">
    @yield('css')
</head>

<body>

@include('UserCommon.header')
@yield('content')
@include('UserCommon.footer')

<!-- Js Plugins -->
<script src="{{asset('ashionshop/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('ashionshop/js/bootstrap.min.js')}}"></script>
<script src="{{asset('ashionshop/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('ashionshop/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('ashionshop/js/mixitup.min.js')}}"></script>
<script src="{{asset('ashionshop/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('ashionshop/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('ashionshop/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('ashionshop/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('ashionshop/js/main.js')}}"></script>
@yield('js')
</body>
</html>
