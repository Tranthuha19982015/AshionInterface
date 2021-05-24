<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->limit(8)->get();
        $productss = Product::limit(12)->get();
        return view('home.home', compact('sliders', 'categorys', 'products','productss'));
    }

    public function getLogin()
    {
        $categorys = Category::where('parent_id', 0)->get();
        return view('login_register.login', compact('categorys'));
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự!',
            'password.max' => 'Mật khẩu không quá 20 ký tự'
        ]);

        $credentials = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'failed', 'message' => 'Đăng nhập thất bại']);
        }
    }


    public function getRegister()
    {
        $categorys = Category::where('parent_id', 0)->get();
        return view('login_register.register', compact('categorys'));
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'name' => 'required',
            're_password' => 'required|same:password'
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã có người sử dụng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự!',
            'password.max' => 'Mật khẩu không quá 20 ký tự',
            'name.required' => 'Tên người dùng không được để trống',
            're_password.required' => 'Nhập lại mật khẩu không được để trống',
            're_password.same' => 'Nhập lại mật khẩu không chính xác!'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'Tạo tài khoản thành công');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $product = Product::where('name', 'like', '%' . $request->key . '%')
            ->orWhere('price', $request->key)
            ->get();
        return view('home.search', compact('categorys','product'));
    }
}
