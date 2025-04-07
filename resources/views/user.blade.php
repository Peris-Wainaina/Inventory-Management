<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Home</title>
</head>
<body class="body1">
<div>
    <form class="form1" action="/" method="POST">
        @csrf
    <h2>RBN Inventory Management System</h2>
    <label for="email">Email Address: </label>
    <input type="text" name="email"/><br><br>
    <label for="password">Password: </label>
    <input type="password" name="password"/><br><br>
    <button>Login</button>
    </form>
</div>
</body>
</html>

