<?php

namespace App\Http\Controllers\admin;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.subcategory.index');
    }

    public function fetchData()
    {
        $subcategories = Subcategory::with('category')->get();
        return response()->json($subcategories);
    }

    public function assign(Request $request)
    {
        $category = $request->category_id;

        $subcategory = Subcategory::find($request->subcategory_id);
        if (!$subcategory) {
            return response()->json(['success' => false, 'message' => 'Subcategory not found.']);
        }
        $subcategory->category_id = $category;
        $subcategory->save();
        return response()->json(['success' => true, 'message' => 'Subcategory assigned successfully.']);
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
        }


        $subcategory = Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);
        return response()->json(['success' => true, 'message' => 'Subcategory assigned successfully.']);
    }

    public function destroy(Request $request)
    {
        $subcategory = Subcategory::find($request->id);
        $subcategory->delete();
        return response()->json(['success' => true, 'message' => 'Subcategory assigned successfully.']);

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
        }


        $subcategory = Subcategory::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->save();
        return response()->json(['success' => true, 'message' => 'Subcategory assigned successfully.']);
    }

}
