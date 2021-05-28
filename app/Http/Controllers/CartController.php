<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{

    private $customer, $order, $order_details;

    public function __construct(Customer $customer, Order $order, OrderDetail $orderDetail)
    {
        $this->customer = $customer;
        $this->order = $order;
        $this->order_details = $orderDetail;
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->feature_image_path
            ];
        }
        session()->put('cart', $cart);
        return Redirect::back();
//        return redirect()->route('showCart');
    }

    public function showCart()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $carts = session()->get('cart');
        return view('cart.shopcart', compact('categorys', 'carts'));


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

    public function deleteCart(Request $request)
    {
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

    public function checkout()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $carts = session()->get('cart');
        return view('cart.components.checkout', compact('categorys', 'carts'));
    }

    public function postCheckout(Request $request)
    {
        $cart = session()->get('cart');
        try {
            $dataInsertCustom = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone
            ];
            $customer = $this->customer->create($dataInsertCustom);

            $dataInsertOrder = [
                'customer_id' => $customer->id,
                'status' => 0,
                'total_cost' => $request->total
            ];
            $order = $this->order->create($dataInsertOrder);

            foreach ($cart as $cartItem) {
                $dataInsertOrderDetail = [
                    'order_id' => $order->id,
                    'product_id' => $cartItem['id'],
                    'order_quantity' => $cartItem['quantity']
                ];
                $this->order_details->create($dataInsertOrderDetail);
            }
            session()->forget('cart');
            return redirect()->route('home');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line:' . $exception->getLine());
        }
    }
}
