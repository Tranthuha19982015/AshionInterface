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
                            <form action="" method="">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Tên người dùng:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Địa chỉ email:</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email-address"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="entry_password"
                                               required>
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
