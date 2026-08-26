@extends('layout')

@section('content')

    <h2>Edit Product: {{ $product->product_title }}</h2>

    <a href="{{ route('products.index') }}">Back to Product List</a>
    <hr>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- update process -->

        <div>
            <label>Product Title:</label><br>
            <input type="text" name="product_title" value="{{ old('product_title', $product->product_title) }}">
        </div>
        <br>
        <div>
            <label>Category:</label><br>
            <select name="product_category_id">
                <option value="">-- Select a Category (Optional) --</option>
                @foreach($categories as $category)

                    <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->category_title }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Barcode:</label><br>
            <input type="text" name="barcode" value="{{ old('barcode', $product->barcode) }}">
        </div>
        <br>
        <div>
            <label>Status:</label><br>
            <select name="product_status">
                <option value="1" {{ old('product_status', $product->product_status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('product_status', $product->product_status) == '0' ? 'selected' : '' }}>Passive</option>
            </select>
        </div>
        <br>
        <button type="submit">Update Product</button>
    </form>

@endsection