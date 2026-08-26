<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1E1E2F; 
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .login-card h2 {
            margin-top: 0;
            color: #1E1E2F;
            margin-bottom: 20px;
        }

        .login-card label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
            color: #34495e;
        }

        .login-card input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .login-card input:focus {
            border-color: #6C5DD3;
            outline: none;
            box-shadow: 0 0 5px rgba(108, 93, 211, 0.3);
        }

        .login-card button {
            width: 100%;
            background-color: #6C5DD3;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-card button:hover {
            background-color: #5a4bba;
        }

        .error-msg {
            color: #e74c3c;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Login</h2>
        
        @if ($errors->any())
            <div class="error-msg">
                Invalid credentials. Please try again.
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <label>Username</label>
            <input type="text" name="username" required autofocus placeholder="admin">

            <label>Password</label>
            <input type="password" name="password" required placeholder="••••••••">

            <button type="submit">Sign In</button>
        </form>
    </div>

</body>
</html>