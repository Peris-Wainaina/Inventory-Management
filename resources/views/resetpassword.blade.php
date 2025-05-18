<div>
<h2>Reset Password</h2>

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">

    <div>
        <label>New Password</label>
        <input type="password" name="password" required>
    </div><br>
    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div><br>
    <button type="submit">Reset Password</button>
</form>
</div>
