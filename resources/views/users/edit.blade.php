<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

    <h2>Edit User: {{ $user->user_title }}</h2>

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

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div>
            <label>Username:</label><br>
            <input type="text" name="username" value="{{ old('username', $user->username) }}">
        </div>
        <br>
        <div>
            <label>User Title:</label><br>
            <input type="text" name="user_title" value="{{ old('user_title', $user->user_title) }}">
        </div>
        <br>
        <div>
            <label>Password (Leave blank if you don't want to change it):</label><br>
            <input type="password" name="password">
        </div>
        <br>
        <button type="submit">Update</button>
    </form>

</body>
</html>