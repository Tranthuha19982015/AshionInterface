@extends('layouts.master')
@section('title')
    <title>Trang chu</title>
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
                        <div class="card-header">Đăng ký tài khoản</div>
                        <div class="card-body">
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                {{--Nếu có error thì in ra error--}}
                                @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                        @foreach($errors -> all() as $err)
                                            {{$err}}
                                        @endforeach
                                    </div>
                                @endif
                                {{--Nếu tạo tài khoản thành công mới in ra thông báo--}}
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Tên người dùng:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Địa chỉ email:</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="re_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <a class="col-md-9 col-form-label text-md-right" href="{{route('login')}}">
                                        Bạn đã có tài khoản? Đăng nhập!</a>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng ký
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
