<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryId)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $category = Category::find($categoryId);
        $products = Product::where('category_id', '=', $categoryId)->paginate(9);
        return view('product.category.list', compact('categorys', 'category', 'products'));
    }

    public function getDetail(Request $req)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $product = Product::where('id', $req->id)->first();
        $product_similar=Product::where('category_id',$product->category_id)->paginate(4);
        return view('product.category.product_details', compact('categorys','product','product_similar'));
    }

}
