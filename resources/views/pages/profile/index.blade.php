<!-- resources/views/profile/index.blade.php -->
@extends('layouts.template')

@section('content')
<div class="profile-container">
    <h1>User Profile</h1>
    <div class="profile-details">
        <div class="profile-image">
            @if($user->image)
                <img src="{{ asset('assets/images/users/' . $user->image) }}" alt="{{ $user->username }}'s profile picture">
            @else
                <img src="{{ asset('assets/images/profile.png') }}" alt="Default profile picture">
            @endif
        </div>
        <div class="profile-info">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>First Name:</strong> {{ $user->fname }}</p>
            <p><strong>Last Name:</strong> {{ $user->lname }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Weight:</strong> {{ $user->weight }} kg</p>
            <p><strong>Height:</strong> {{ $user->height }} cm</p>
            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <a href="{{ route('profile.edit', $user->id) }}"><button class="btn">Edit Profile</button></a>
        </div>
    </div>
</div>
@endsection
