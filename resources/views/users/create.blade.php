<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
</head>
<body>

    <h2>Add New User</h2>

    <a href="{{ route('users.index') }}">Back to List</a>
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

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div>
            <label>Username (Login):</label><br>
            <input type="text" name="username" value="{{ old('username') }}">
            <small>Should not contain spaces, letters and numbers only.</small>
        </div>
        <br>
        <div>
            <label>User Title:</label><br>
            <input type="text" name="user_title" value="{{ old('user_title') }}">
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="password">
            <small>At least 6 characters.</small>
        </div>
        <br>
        <button type="submit">Save</button>
    </form>

</body>
</html>