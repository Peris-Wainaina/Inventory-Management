@extends('dashboard')

@section('content')
<div>
    <form>
        @csrf
    <h2>Register User</h2>
    <label for="name">Name: </label>
    <input type="text" name="name"/><br><br>
    <label for="email">Email Address: </label>
    <input type="text" name="email"/><br><br>
    <label for="password">Password: </label>
    <input type="password" name="password"/><br><br>
    <label for="department">Department: </label>
    <input type="text" name="department"/><br><br>
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type ="submit">Register</button>
</form>
</div>
@endsection