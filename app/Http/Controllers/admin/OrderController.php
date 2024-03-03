<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index()
    {
        return view('admin.order.index');
    }

    public function fetchData()
    {
        $orders = Order::where('status', '0')->get();
        return response()->json($orders);
    }


    public function orderDetails($id)
    {
        $order = Order::where('id', $id)->first(); // Use first() instead of get()
        $orderItems = OrderItem::where('order_id', $id)->with('product')->get();
        return view('admin.order.order-details', ['order' => $order, 'orderItems' => $orderItems]);
    }

    public function updateState(Request $request)
    {
        $id = $request->input('id');
        $state = $request->input('state');

        // Assuming you have an Order model
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update the status based on the provided state
        if ($state === 'Completed') {
            $order->status = 1; // Assuming 2 represents 'Completed' status
        } else {
            $order->status = 0; // Assuming 1 represents 'Pending' status
        }

        $order->save();

        return response()->json(['message' => $state ,'order' =>$order ]);
    }

    public function orderHistoryIndex()
    {
        return view('admin.order.history');

    }

    public function orderHistoryFetch()
    {
        $orders = Order::where('status', '1')->get();
        return response()->json($orders);

    }


    public function update(Request $request)
    {
        $product = Order::find($request->id);
        return response()->json(['message' => 'Order updated successfully'], 200);
    }


    public function destroy(Request $request)
    {
        $product = Order::find($request->id);
        $product->delete();
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }

}
