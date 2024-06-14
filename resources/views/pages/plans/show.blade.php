@extends('layouts.template')

@section('content')
<section class="section__container price__container" id="plans">
    <h2 class="section__header">Plan Details</h2>
    <div class="container">
        <div class="card shadow my-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $plan->name }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            @if ($plan->image)
                                <img src="{{ asset('assets/images/plans/' . $plan->image) }}" class="img-fluid" alt="Plan Image">
                            @else
                                <img src="{{ asset('assets/images/close-up-man-exercising-after-online-instructor_23-2149240208.jpg') }}" class="img-fluid" alt="Default Plan Image">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p><strong>Description:</strong> {{ $plan->description }}</p>
                        <p><strong>Duration:</strong> {{ $plan->duration }} Months</p>
                        <p><strong>Created by:</strong> {{ $plan->user->username }}</p>
                        <p><strong>Created on:</strong> {{ $plan->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                <hr>
                <h5 class="mt-4">Exercises</h5>
                <ul class="list-group">
                    @foreach ($plan->programs as $program)
                        <li class="list-group-item">
                            <strong>{{ $program->exercise->name}}</strong>
                            <div class="row mt-2">
                                <div class="col">
                                    <p><strong>Reps:</strong> {{ $program->reps }}</p>
                                </div>
                                <div class="col">
                                    <p><strong>Sets:</strong> {{ $program->sets }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('plans.index') }}" class="btn btn-secondary mt-3">Back to Plans</a>
            </div>
        </div>
    </div>
</section>
@endsection
