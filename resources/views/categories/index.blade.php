<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category List</title>
</head>
<body>

    <h2>Category List</h2>

    <a href="{{ route('categories.create') }}">Add New Category</a><br>
    
    <a href="{{ route('users.index') }}">Go to Users</a>
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
                <th>Category Title</th>
                <th>Description</th>
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
                            <span style="color: green;">Active</span>
                        @else
                            <span style="color: gray;">Passive</span>
                        @endif
                    </td>
                    <td>
                      
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        
                        <form action="#" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this category?');">
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