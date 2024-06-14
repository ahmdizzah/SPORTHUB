@extends('layouts.template')
@section('content')
  <section class="section__container class__container" id="features">
    <a href="{{ route('exercises.index') }}" class="btn btn-primary mb-3">Back</a>
    <h2 class="section__header">{{ $exercise->name }}</h2>
    @if($exercise->image)
      <img src="{{ asset('assets/images/exercises/' . $exercise->image) }}" alt="{{ $exercise->name }}" class="exercise-image">
    @else
      <img src="{{ asset('assets/images/close-up-man-exercising-after-online-instructor-2.png') }}" alt="{{ $exercise->name }}" class="exercise-image">
    @endif
    <p class="exercise-description">{{ $exercise->description }}</p>
  </section>
@endsection
