<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body class="body2">
<div class="sidebar">
<h1>Dashboard</h1>
        <a href="/stationery" id="stationery" class="nav-link">Stationery</a>
        <a href="/orders" id="orders" class="nav-link">Orders</a>
        <a href="/stock" id="stock" class="nav-link">Stock</a>
        <a class="use" href="/register" id="users" class="nav-link">Users</a>
        <a href="{{ route('logout') }}" id="logout" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
</div>
<div class="main-content" id="mainContent">
      @yield('content')
    </div>
</body>
</html>

