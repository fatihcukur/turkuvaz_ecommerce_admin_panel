@extends('layout')

@section('content')

    <h2>Edit Category: {{ $category->category_title }}</h2>

    <a href="{{ route('categories.index') }}">Back to Category List</a>
    <hr>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div>
            <label>Category Title:</label><br>
            <input type="text" name="category_title" value="{{ old('category_title', $category->category_title) }}">
        </div>
        <br>
        <div>
            <label>Category Description:</label><br>
            <textarea name="category_description" rows="4" cols="30">{{ old('category_description', $category->category_description) }}</textarea>
        </div>
        <br>
        <div>
            <label>Status:</label><br>
            <select name="status">
                
                <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Passive</option>
            </select>
        </div>
        <br>
        <button type="submit">Update Category</button>
    </form>

@endsection