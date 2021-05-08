<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function saveCart(Request $request){
        $categorys=Category::where('parent_id',0)->get();
        $productId =$request->id_hidden;
        $quantity=$request->qty;
        $productInfo=Product::where('id','=',$productId)->first();
        return view('cart.shopcart',compact('categorys', 'productInfo'));
    }
}
