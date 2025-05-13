@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
<div id="changePictureForm" style="display:none;">
    <h3>Change Profile Picture</h3>
    <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            @if(auth()->user()->profile_picture)
                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" width="100" height="100"><br>
            @endif
            <input type="file" name="profile_picture" required>
            <button type="submit">Upload</button>
        </div>
    </form>
</div>

<div id="changePasswordForm" style="display:none;">
    <h3>Change Password</h3>
    <form action="{{ route('profile.update.password') }}" method="POST">
        @csrf
        <div>
            <label>Current Password:</label>
            <input type="password" name="current_password" required>
        </div>
        <div>
            <label>New Password:</label>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label>Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" required>
        </div>
        <button type="submit">Change Password</button>
    </form>
</div>