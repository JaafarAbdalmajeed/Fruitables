<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.category.index');
    }

    public function fetchData()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories|regex:/^[a-zA-Z0-9\s]+$/',
        ], [
            'name.required' => 'Name is required.',
            'name.unique' => 'Name already exists.',
            'name.regex' => 'Name must contain only letters, numbers, and spaces.',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json(['message' => 'Category created successfully'], 200);
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|regex:/^[a-zA-Z0-9\s]+$/',
        ], [
            'name.required' => 'Name is required.',
            'name.unique' => 'Name already exists.',
            'name.regex' => 'Name must contain only letters, numbers, and spaces.',
        ]);


        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return response()->json(['message' => 'Category updated successfully'], 200);
    }
}
