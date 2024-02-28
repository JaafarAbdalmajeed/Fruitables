<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('admin.product.index');
    }

    public function fetchData()
    {
        $product = Product::with('subcategory')->get();
        return response()->json($product);
    }

    public function create(Request $request)
    {

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$imageName);
            $imageURL = 'images/'.$imageName;
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $imageURL; // Save the image URL in the database
        $product->subcategory_id = $request->subcategory_id;


        $product->save();
        return response()->json(['message' => 'Product created successfully'], 201);
    }


    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        if ($request->has('subcategory_id')) {
            $product->subcategory_id = $request->subcategory_id;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;
            $product->image = $imagePath;
        }
            $product->save();
        return response()->json(['message' => 'Product updated successfully'], 200);
    }



    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);


    }

    public function assign(Request $request)
    {

    }

}
