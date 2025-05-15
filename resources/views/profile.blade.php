@extends('dashboard')

@section('content')
@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
<div id="changePictureForm" style="display:none;">
    <h3>Change Profile Picture</h3>
    <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            @if(auth()->user()->profile_picture)
                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" width="100" height="100"><br><br>
            @endif
            <input type="file" name="profile_picture" required>
            <button class="dt3" type="submit">Upload</button>
        </div>
    </form>
</div>

<div id="changePasswordForm" style="display:none;">
    <h3>Change Password</h3>
    <form class="dt2" action="{{ route('profile.update.password') }}" method="POST">
        @csrf
        <div>
            <label>Current Password:</label>
            <input type="password" name="current_password" required>
        </div><br>
        <div>
            <label>New Password:</label>
            <input type="password" name="new_password" required>
        </div><br>
        <div>
            <label>Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" required>
        </div><br>
        <button type="submit">Change Password</button>
    </form>
</div>

<script>
    function handleHashChange() {
        document.getElementById("changePictureForm").style.display = "none";
        document.getElementById("changePasswordForm").style.display = "none";

        const hash = window.location.hash;

        if (hash === "#changePictureForm") {
            document.getElementById("changePictureForm").style.display = "block";
        }

        if (hash === "#changePasswordForm") {
            document.getElementById("changePasswordForm").style.display = "block";
        }
    }

    document.addEventListener("DOMContentLoaded", handleHashChange);
    window.addEventListener("hashchange", handleHashChange);
</script>
@endsection