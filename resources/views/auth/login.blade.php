<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body>

    <h2>Admin Panel Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        
        @csrf

        <div>
            <label>User Name:</label><br>
            <input type="text" name="username" value="{{ old('username') }}">
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="password">
        </div>
        <br>
        <button type="submit">Login</button>

    </form>

</body>
</html>