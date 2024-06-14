@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                      @if (Auth::user()->image)
                        <img src="{{ asset('assets/images/users/' . Auth::user()->image) }}" class="img-fluid" alt="User Avatar" width="400">
                      @else
                        <img src="{{ asset('assets/images/profile.png') }}" class="img-fluid" alt="User Avatar" width="400">
                        
                      @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <h4>{{ Auth::user()->username }}</h4>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <p><strong>Full name:</strong> {{ Auth::user()->fname . ' ' . Auth::user()->lname }}</p>
                    <p><strong>Weight:</strong> {{ Auth::user()->weight ?? '-' }} kg</p>
                    <p><strong>Height:</strong> {{ Auth::user()->height ?? '-'}} cm</p>
                    <p><strong>Date of Birth:</strong> {{ Auth::user()->date_of_birth ?? '-' }}</p>
                    <p><strong>Address:</strong> {{ Auth::user()->address ?? '-'}}</p>
                    <p><strong>Phone:</strong> {{ Auth::user()->phone ?? '-'}}</p>
                    <p><strong>Joined on:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
