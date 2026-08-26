<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
</head>
<body>

    <h2>Product List</h2>

    <a href="{{ route('products.create') }}">Add New Product</a><br>
    <a href="{{ route('categories.index') }}">Go to Categories</a>
    <hr>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Title</th>
                <th>Category</th>
                <th>Barcode</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_title }}</td>
                    <td>{{ optional($product->category)->category_title ?? 'No Category' }}</td>
                    
                    <td>{{ $product->barcode }}</td>
                    <td>
                        @if($product->product_status == 1)
                            <span style="color: green;">Active</span>
                        @else
                            <span style="color: gray;">Passive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>