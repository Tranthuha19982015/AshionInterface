<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
//        session()->forget('cart');

        $categorys = Category::where('parent_id', 0)->get();
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $cart[$id]['quantity'];
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->feature_image_path
            ];
        }
        session()->put('cart', $cart);
//        $carts = session()->get('cart');
//        $showcart = view('cart.shopcart', compact('categorys', 'carts'))->render();
        return response()->json([
//            'show_cart' => $showcart,
            'code' => 200
        ], 200);
    }

    public function showCart()
    {
        $categorys = Category::where('parent_id', 0)->get();
        if(empty(session()->get('cart'))){
            $carts = session()->get('cart',0);
            return view('cart.shopcart', compact('categorys', 'carts'));
        }
        else{
            $carts = session()->get('cart');
            return view('cart.shopcart', compact('categorys', 'carts'));
        }

    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('cart.components.cart_component', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cartComponent,
                'code' => 200
            ], 200);
        }
    }

    public function deleteCart(Request $request){
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('cart.components.cart_component', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cartComponent,
                'code' => 200
            ], 200);
        }
    }
}
