<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $categorys=Category::where('parent_id',0)->get();
        $products=Product::latest()->limit(8)->get();
        return view('home.home', compact('sliders', 'categorys','products'));
    }
}
