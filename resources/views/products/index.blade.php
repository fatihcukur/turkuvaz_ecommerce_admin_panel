@extends('layout')

@section('content')

    <h2>Product List</h2>

    <a href="{{ route('products.create') }}" class="btn-add">+ Add New Product</a>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ProductCategoryId</th>
                <th>ProductTitle</th>
                <th>Category</th>
                <th>Barcode</th>
                <th>ProductStatus</th>
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
                            <span class="status-active">Active</span>
                        @else
                            <span class="status-passive">Passive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="openDeleteModal(event, this);">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; border:none; background:none; cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection