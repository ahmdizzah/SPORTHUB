@extends('dashboard.layouts.template')
@section('content')
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="{{route('exercises.index')}}" class="btn btn-primary">Back</a>
                     <div class="card shadow my-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create Exercise</h6>
                        </div>
                        <div class="card-body">
                               <!-- Form to Add Exercise -->
                               <form action="{{ route('exercises.store') }}" method="POST" enctype="multipart/form-data">
                                   @csrf
                                   <div class="form-group">
                                       <label for="name">Exercise Name</label>
                                       <input type="text" class="form-control" id="name" name="name" required>
                                   </div>
                                   <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea class="form-control" id="description" name="description"></textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="image">Image</label>
                                       <input type="file" class="form-control-file" id="image" name="image">
                                   </div>
                                   <button type="submit" class="btn btn-success">Add Exercise</button>
                               </form>
                              </div>
                    </div>

            </div>
@endsection