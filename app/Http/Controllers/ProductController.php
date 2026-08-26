<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create()
    {
    $categories = Category::where('status', 1)->get();

    return view('products.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'barcode' => 'required|unique:products,barcode',
            'product_status' => 'required|boolean',
            'product_category_id' => 'nullable'
        ]);

        Product::create([
            'product_title' => $request->product_title,
            'barcode' => $request->barcode,
            'product_status' => $request->product_status,
            'product_category_id' => $request->product_category_id,
        ]);

        return redirect()->route('products.create')->with('success', 'Product added successfuly');
    }
}
