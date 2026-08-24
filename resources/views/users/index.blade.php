<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>

    <h2>Admin Users</h2>
    
    <a href="{{ route('users.create') }}">Add New User</a><br>

    <!-- logout link -->
    <a href="{{ route('logout') }}">Log Out</a>
    <hr>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('users.bulk_delete') }}" method="POST">
        @csrf

        <button type="submit" style="margin-bottom: 10px; color: red;">Delete Selected</button>


    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>Username</th>
                <th>User Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}">
                    </td>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->user_title }}</td>
                    <td>
                        <a href="#">Edit</a>

                        <a href="#" style="color: red;">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

</body>
</html>