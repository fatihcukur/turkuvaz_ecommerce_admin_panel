<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_title' => 'required|unique:categories,category_title',
            'category_description' => 'required',
            'status' => 'required|boolean'
        ], [
            'category_title.required' => 'Category name is required',
            'category_title.unique' => 'This category name is already in use',
            'category_description.required' => 'Category description is required',
            'status.required' => 'Status filed is required'

        ]);

        Category::create([
            'category_title' => $request->category_title,
            'category_description' => $request->category_description,
            'status' => $request->status,    
        ]);

        return redirect()->route('categories.create')->with('success', 'Category successfuly added');
    }

}
