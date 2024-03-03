<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function fetchData()
    {
        $user = Auth::id();
        $cartItems = Cart::where('user_id', $user)->with('product')->get();
        return response()->json($cartItems);
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->country = $request->country;
        $order->postcode = $request->postcode;
        $order->mobile = $request->mobile;
        $order->email = $request->email;
        $order->order_note = $request->order_note;
        $order->tracking_no = 'fruitables' . rand(1111, 9999);


        $user = Auth::id();
        $cartItems = Cart::where('user_id', $user)->with('product')->get();
        $total_price = 0;
        foreach ($cartItems as $item) {
            $total_price += $item->price * $item->quantity;
        }

        $order->total_price = $total_price;

        $order->save();

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        Cart::where('user_id', $user)->delete();
        return response()->json(['success' => true, 'message' => 'Order placed successfully']);
        }

        public function razorPayCheck(Request $request)
        {
            $user = Auth::id();
            $cartItems = Cart::where('user_id', $user)->with('product')->get();
            foreach($cartItems as $item)
            {
                $total_price += $item->product->price * $item->quantity;
            }
            $firstname  = $request->firstname;
            $lastname = $request->lastname;
            $address = $request->address;
            $city = $request->city;
            $country = $request->country;
            $postcode = $request->postcode;
            $mobile = $request->mobile;
            $email = $request->email;
            $order_note = $request->order_note;

            return response()->json([
                'firstname'  => $firstname,
                'lastname' => $lastname,
                'address' => $address,
                'city' => $city,
                'country' => $country,
                'postcode' => $postcode,
                'mobile' => $mobile,
                'email' => $email,
                'order_note' => $order_note,
                'total_price' => $total_price
            ]);

        }


}
