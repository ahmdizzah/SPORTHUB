@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid">
    <a href="{{ route('plans.index') }}" class="btn btn-primary">Back</a>
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Plan Details</h6>
        </div>
        <div class="card-body">
          @if($plan->image)
          <div class="form-group">
              <img src="{{ asset('assets/images/plans/' . $plan->image) }}" alt="Plan Image" class="img-fluid" style="max-width: 500px; max-height: 600px;">
          </div>
          @else
          <div class="form-group">
              <img src="{{ asset('assets/images/close-up-man-exercising-after-online-instructor-2.png') }}" alt="Plan Image" class="img-fluid" style="max-width: 500px; max-height: 600px;">
          </div>
          @endif
            <div class="form-group">
                <label class="form-label">Plan Name:</label>
                <p class="form-control-plaintext">{{ $plan->name }}</p>
            </div>

            <div class="form-group">
                <label class="form-label">Description:</label>
                <p class="form-control-plaintext">{{ $plan->description }}</p>
            </div>

            <div class="form-group">
                <label class="form-label">Duration:</label>
                <p class="form-control-plaintext">{{ $plan->duration }} days</p>
            </div>
            

            <div class="form-group">
                <label class="form-label">Exercises:</label>
                <div class="list-group">
                    @foreach($plan->programs as $program)
                    <div class="list-group-item d-flex align-items-center">
                      @if ($program->exercise->image)
                        <img src="{{ asset('assets/images/exercises/' . $program->exercise->image) }}" alt="Exercise Image" class="img-fluid mr-3" style="width: 100px; height: 100px;">
                      @else
                        <img src="{{ asset('assets/images/close-up-man-exercising-after-online-instructor-2.png') }}" alt="Exercise Image" class="img-fluid mr-3" style="width: 100px; height: 100px;">
                      @endif
                        <div>
                            <h5 class="mb-1">{{ $program->exercise->name }}</h5>
                            <p class="mb-1">{{ $program->exercise->description }}</p>
                            <small>Reps: {{ $program->reps }} | Sets: {{ $program->sets }}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection