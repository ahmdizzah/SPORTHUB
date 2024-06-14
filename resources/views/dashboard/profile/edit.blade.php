@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" id="fname" name="fname" class="form-control" value="{{ old('fname', $user->fname) }}" required>
                </div>

                <div class="form-group">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" id="lname" name="lname" class="form-control" value="{{ old('lname', $user->lname) }}" required>
                </div>

                <div class="form-group">
                    <label for="weight" class="form-label">Weight (kg)</label>
                    <input type="number" id="weight" name="weight" class="form-control" value="{{ old('weight', $user->weight) }}">
                </div>

                <div class="form-group">
                    <label for="height" class="form-label">Height (cm)</label>
                    <input type="number" id="height" name="height" class="form-control" value="{{ old('height', $user->height) }}">
                </div>

                <div class="form-group">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Profile Picture</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
