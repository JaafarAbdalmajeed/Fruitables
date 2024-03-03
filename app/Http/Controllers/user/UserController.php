<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }

    public function shop()
    {
        return view('user.pages.shop');
    }

    public function shopDetails()
    {
        return view('user.pages.shop-detail');
    }

    public function cart()
    {
        return view('user.pages.cart');
    }

    public function checkout()
    {
        return view('user.pages.checkout');
    }

    public function testimonial()
    {
        return view('user.pages.testimonial');
    }

    public function notFound()
    {
        return view('user.pages.404');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }

    public function myOrder()
    {
        return view('user.pages.order');
    }

    public function orderItems()
    {
        $user = Auth::id();

        $order = Order::where('user_id', $user)->first();
        if ($order) {
            $orderItems = OrderItem::where('order_id', $order->id)->with('product')->get();
            return response()->json($orderItems);
        } else {
            return response()->json(['message' => 'No order found for the user'], 404);
        }
    }

}
