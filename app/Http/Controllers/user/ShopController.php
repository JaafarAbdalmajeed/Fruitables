<?php

namespace App\Http\Controllers\user;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //
    public function search(Request $request)
    {
        $letter = $request->letter;
        $products = Product::where('name', 'LIKE', $letter . '%')->get();
        return response()->json($products);
    }

    public function productsCategory(Request $request)
    {
        $category = Subcategory::where('name', $request->category)->first();

        $products = Product::where('subcategory_id', $category->id)->get();
        return response()->json($products);
    }
    public function productsPrice(Request $request)
    {
        $price = $request->input('price');
        $pageSize = $request->input('pageSize', 8); // Assuming you have a default page size

        $products = Product::where('price', '<=', $price)->paginate($pageSize);

        return response()->json($products);
    }

}
