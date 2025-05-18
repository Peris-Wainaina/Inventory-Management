<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Login - RBN Inventory</title>
</head>
<body class="body1">
<div>
    <form class="form1" action="/" method="POST">
        @csrf
        <h2>RBN Inventory Management System</h2>

        {{-- Session Flash Error --}}
        @if (session('error'))
            <div style="color: red; margin-bottom: 10px;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="email">Email Address:</label>
        <input type="text" name="email" value="{{ old('email') }}" /><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" /><br><br>

        <button type="submit">Login</button>
        <a class="lnk" href="{{ route('password.request') }}">Forgot Password?</a>
    </form>
</div>
</body>
</html>

