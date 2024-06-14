@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="{{ route('exercises.index') }}" class="btn btn-primary">Back</a>
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Exercise</h6>
        </div>
        <div class="card-body">
            <!-- Form to Edit Exercise -->
            <form action="{{ route('exercises.update', $exercise->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Exercise Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $exercise->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $exercise->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if ($exercise->image)
                        <div class="mt-2">
                            <img src="{{ asset('assets/images/exercises/' . $exercise->image) }}" alt="Exercise Image" width="100">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Update Exercise</button>
            </form>
        </div>
    </div>

</div>
@endsection
