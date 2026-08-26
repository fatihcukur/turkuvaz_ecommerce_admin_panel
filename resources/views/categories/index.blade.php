@extends('layout')

@section('content')

    <h2>Category List</h2>

    <a href="{{ route('categories.create') }}" class="btn-add">+ Add New Category</a>

    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CategoryTitle</th>
                <th>CategoryDescription</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_title }}</td>
                    <td>{{ $category->category_description }}</td>
                    <td>
                        @if($category->status == 1)
                            <span class="status-active">Active</span>
                        @else
                            <span class="status-passive">Passive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="openDeleteModal(event, this);">
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