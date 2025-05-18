<div>
<h2>Forgot Your Password?</h2>

@if (session('status'))
    <div style="color: green;">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label>Email Address</label>
        <input type="email" name="email" required>
    </div><br>
    <button type="submit">Send Password Reset Link</button>
</form>
</div>
