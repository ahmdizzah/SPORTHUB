@extends('layouts.template')
@section('content')
  <section class="section__container class__container" id="features">
    <h2 class="section__header">Pick our top lineup workout exercises</h2>
    <div class="class__grid">
      @foreach ($exercises as $exercise)
      <a href="{{route('exercises.show', $exercise)}}">
        <div class="class__card">
          <img src="{{asset('assets/images/dot-bg.png')}}" alt="bg" class="class__bg" />
          @if ($exercise->image)
            <img src="{{asset('assets/images/exercises/'.$exercise->image)}}" alt="class" />
          @else
          <img src="{{asset('assets/images/young-man-making-sport-exercises-home-1-bg.png')}}" alt="class" />
          @endif
          <div class="class__content">
            <h4>{{$exercise->name}}</h4>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </section>
@endsection