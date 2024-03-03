<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function fetchItems()
    {
        $user = Auth::id();
        $cartItems = Cart::where('user_id', $user)->with('product')->get();
        return response()->json($cartItems);
    }

    public function addItem(Request $request)
    {
        $product_id = $request->id;
        $user_id = Auth::id();

        $cartItem = Cart::create([
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'quantity'=>$request->quantity
        ]);

        return response()->json(['message' => 'Product added to cart successfully', 'cart_item' => $cartItem], 201);


    }

    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::find($request->id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        $user = Auth::id();
        $cartItems = Cart::where('user_id', $user)->with('product')->get();


        return response()->json([
            'message' => 'Quantity updated successfully',
            'quantity' => $cartItem->quantity,
            'cartItems' => $cartItems
        ], 200);

    }

    public function removeItem($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Item deleted from cart successfully'], 200);
    }
}
