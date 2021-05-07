<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //$slug,
    public function index($categoryId){
        $categorys=Category::where('parent_id',0)->get();
        $products=Product::where('category_id', '=' ,$categoryId)->paginate(9);
//        dd($products);
        return view('product.category.list',compact('categorys','products'));
    }
}
