@extends('layouts.master')
@section('title')
    <title>Login</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('content')
    <section class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Đăng nhập</div>
                        <div class="card-body">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                {{--in thong bao--}}
                                @if(Session::has('flag'))
                                    <div class="alert alert-{{Session::get('flag')}}">
                                        {{Session::get('message')}}
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Địa chỉ email:</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Nhớ mật khẩu
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <a class="col-md-9 col-form-label text-md-right" href="{{route('register')}}">
                                        Bạn chưa có tài khoản? Đăng ký!</a>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
