<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
</head>
<body>

    <h2>Add New Category</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label>Category Title:</label><br>
            <input type="text" name="category_title" value="{{ old('category_title') }}">
        </div>
        <br>
        <div>
            <label>Category Description:</label><br>
            <textarea name="category_description" rows="4" cols="30">{{ old('category_description') }}</textarea>
        </div>
        <br>
        <div>
            <label>Status:</label><br>

            <select name="status">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Passive</option>
            </select>
        </div>
        <br>
        <button type="submit">Save Category</button>
    </form>

</body>
</html>