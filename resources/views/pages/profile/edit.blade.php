@extends('layouts.template')

@section('content')
<div class="profile-edit-container">
    <h1>Edit Profile</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @method('PATCH')
        @csrf
        <div class="form-group">
            @if (Auth::user()->image)
              <img src="{{ asset('assets/images/users/' . Auth::user()->image) }}" alt="{{ Auth::user()->username }}'s profile picture" class="profile-image-preview" id="profileImage">
            @else
              <img src="{{ asset('assets/images/profile.png') }}" alt="{{ Auth::user()->username }}'s profile picture" class="profile-image-preview" id="profileImage">
            @endif
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" required>
        </div>
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="{{ $user->fname }}" required>
        </div>
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="{{ $user->lname }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" id="weight" name="weight" value="{{ $user->weight }}">
        </div>
        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" id="height" name="height" value="{{ $user->height }}">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $user->address }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
        </div>
        <button type="submit">Update Profile</button>
    </form>
</div>

<script>
    function previewImage(event) {
        const image = document.getElementById('profileImage');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.onload = () => {
            URL.revokeObjectURL(image.src); // Free memory
        }
    }
</script>
@endsection
