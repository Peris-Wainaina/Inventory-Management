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
<div class="profile-section">
        <div class="profile-dropdown">
        @if (auth()->user()->profile_picture)
    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" 
         alt="Profile Picture" 
         class="profile-pic">
@else
    <div class="profile-pic blank-circle"></div>
@endif

            <div class="dropdown-content">
            <a href="{{ route('profile.show') }}#changePictureForm">Change Picture</a>
             <a href="{{ route('profile.show') }}#changePasswordForm">Change Password</a>

            </div>
        </div>
    </div>
        <a href="/stationery" id="stationery" class="nav-link">Stationery</a>
        <a href="{{ route('orders.status') }}">Order Status</a>
        @if(auth()->user()->role === 'admin')
        <a href="/orders" id="orders" class="nav-link">Orders</a>
        <a href="/stock" id="stock" class="nav-link">Stock</a>
        <a class="use" href="/register" id="users" class="nav-link">Users</a>
        @endif
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

