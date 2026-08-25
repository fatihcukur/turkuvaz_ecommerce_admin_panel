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

        return redirect()->route('categories.index')->with('success', 'Category successfuly added');
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_title' => 'required|unique:categories,category_title,' . $id,
            'category_description' => 'required',
            'status' => 'required|boolean'
        ], [
            'category_title.required' => 'Category title is required',
            'category_title.unique' => 'This category title is already taken',
            'category_description.required' => 'Category description is required',
            'status.required' => 'Status selection is required'
        ]);

        $category->category_title = $request->category_title;
        $category->category_description = $request->category_description;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');


    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted succesfully');
    }

}
