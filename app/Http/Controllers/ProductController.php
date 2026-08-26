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

        return redirect()->route('products.index')->with('success', 'Product added successfuly');
    }

    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::where('status', 1)->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_title' => 'required',
            'barcode' => 'required|unique:products,barcode,' . $id,
            'product_status' => 'required|boolean',
            'product_category_id' => 'nullable'
        ]);

        $product->product_title = $request->product_title;
        $product->barcode = $request->barcode;
        $product->product_status = $request->product_status;
        $product->product_category_id = $request->product_category_id;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfuly');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfuly');
    }
}
