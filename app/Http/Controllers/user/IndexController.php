<?php

namespace App\Http\Controllers\user;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function products(Request $request)
    {
        $pageSize = $request->input('pageSize', 8); // Get the page size from the request or default to 8
        $products = Product::with('subcategory')->paginate($pageSize); // Fetch products with pagination and subcategory
        // Eager load category for each subcategory
        $products->load('subcategory.category');
            return response()->json($products);
    }
    public function vegetables(Request $request)
    {
        $pageSize = $request->input('pageSize', 8); // Get the page size from the request or default to 8
        $category = Category::where('name', 'vegetables')->first();
        $subcategories = Subcategory::where('category_id', $category->id)->pluck('id');
        $products = Product::whereIn('subcategory_id', $subcategories)->with('subcategory.category')->paginate($pageSize);

        return response()->json($products);
    }

    public function fruits(Request $request)
    {
        $pageSize = $request->input('pageSize', 8); // Get the page size from the request or default to 8

        $category = Category::where('name', 'fruits')->first();
        $subcategories = Subcategory::where('category_id', $category->id)->pluck('id');
        $products = Product::whereIn('subcategory_id', $subcategories)->with('subcategory.category')->paginate($pageSize);

        return response()->json($products);
    }

    public function doughs(Request $request)
    {
        $pageSize = $request->input('pageSize', 8); // Get the page size from the request or default to 8

        $category = Category::where('name', 'doughs')->first();
        $subcategories = Subcategory::where('category_id', $category->id)->pluck('id');
        $products = Product::whereIn('subcategory_id', $subcategories)->with('subcategory.category')->paginate($pageSize);

        return response()->json($products);
    }

    public function meats(Request $request)
    {
        $pageSize = $request->input('pageSize', 8); // Get the page size from the request or default to 8

        $category = Category::where('name', 'meat')->first();
        $subcategories = Subcategory::where('category_id', $category->id)->pluck('id');
        $products = Product::whereIn('subcategory_id', $subcategories)->with('subcategory.category')->paginate($pageSize);

        return response()->json($products);
    }




}
