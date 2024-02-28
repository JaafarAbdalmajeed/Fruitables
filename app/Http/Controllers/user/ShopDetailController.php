<?php

namespace App\Http\Controllers\user;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopDetailController extends Controller
{
    //
    public function product($id){
        $product = Product::with('subcategory.category')->find($id);
        return view('user.pages.shop-detail',compact('product'));
    }

    public function relatedProducts(Request $request)
    {
        $subcategory = Subcategory::where('name', $request->category)->first();
        $products = Product::where('subcategory_id', $subcategory->id)->get();
        return response()->json($products);
    }
}
