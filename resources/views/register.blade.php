@extends('dashboard')

@section('content')
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
<div class ="reg">
    <form action="{{ route('register.store') }}" method="POST" >
        @csrf
    <h2>Register User</h2>
    <label for="name">Name: </label><br>
    <input type="text" name="name"/><br><br>
    <label for="email">Email Address: </label><br>
    <input type="text" name="email"/><br><br>
    <label for="password">Password: </label><br>
    <input type="password" name="password"/><br><br>
    <label for="password_confirmation">Confirm Password: </label><br>
    <input type="password" name="password_confirmation"/><br><br>
    <label for="department">Department: </label><br>
    <input type="text" name="department"/><br><br>
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type ="submit">Register</button>
</form>
</div>
@endsection