<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',  // Ensure the name is a required string and maximum length is 255
        'description' => 'required|string|max:1000'  // Ensure the description is required, a string, and max length is 1000
    ]);

    // Create and save the new category
    $category = new Category($validatedData);
    $category->save();

    // Return a JSON response with the new category data
    return response()->json($category, 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',  // Ensure the name is a required string and maximum length is 255
        'description' => 'nullable|string|max:1000'  // Ensure the description is optional, a string, and max length is 1000
    ]);

    // Update the category with validated data
    $category->update($validatedData);

    // Return a JSON response with the updated category data
    return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
