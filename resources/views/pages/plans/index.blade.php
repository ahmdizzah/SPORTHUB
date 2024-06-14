@extends('layouts.template')
@section('content')

<section class="section__container price__container" id="plans">
    <h2 class="section__header">Our Ideal Workout Plan</h2>
    <div class="price__grid">
      @foreach ($plans as $plan)
      <div class="price__card">
        <div class="price__content">
          <h4>{{ $plan->duration }} Month Program</h4>
          @if ($plan->image)
            <img src="{{ asset('assets/images/plans/' . $plan->image) }}" alt="price" />
          @else
            <img src="{{ asset('assets/images/close-up-man-exercising-after-online-instructor-2.png') }}" alt="price" />
          @endif
          <hr />
          <h4>{{$plan->name}}</h4>
          <p>{{ $plan->description }}</p>
          <p>by {{ $plan->user->username }}</p>
        </div>
        <a href="{{ route('plans.show', $plan->id) }}">
          <button class="btn">Start Your Program</button>
        </a>
      </div>
      @endforeach
    </div>
    <a href="{{ route('plans.create') }}" class="floating-button">
      <i class="fas fa-plus"></i>
    </a>
</section>

@endsection
