<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>

    <h2>Add New Product</h2>

    <a href="{{ route('categories.index') }}">Go to Categories</a>
    <hr>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label>Product Title:</label><br>
            <input type="text" name="product_title" value="{{ old('product_title') }}">
        </div>
        <br>
        <div>

            <label>Category:</label><br>
            <select name="product_category_id">
                <option value="">-- Select a Category (Optional) --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_title }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Barcode:</label><br>
            <input type="text" name="barcode" value="{{ old('barcode') }}">
        </div>
        <br>
        <div>
            <label>Status:</label><br>
            <select name="product_status">
                <option value="1" {{ old('product_status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('product_status') == '0' ? 'selected' : '' }}>Passive</option>
            </select>
        </div>
        <br>
        <button type="submit">Save Product</button>
    </form>

</body>
</html>