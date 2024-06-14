@extends('dashboard.layouts.template')
@section('content')
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="{{route('exercises.create')}}" class="btn btn-primary">Add Exercise</a>

                    <!-- DataTales Example -->
                    <div class="card shadow my-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Exercises</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($exercises as $exercise)  
                                      <tr>
                                        @if ($exercise->image)
                                          <td><img src="{{asset('assets/images/exercises/'.$exercise->image)}}" alt="Exercise Image" width="250" height="250"></td>
                                        @else
                                          <td><img src="{{asset('assets/images/close-up-man-exercising-after-online-instructor-2.png')}}" alt="Exercise Image" width="250" height="250"></td>
                                        @endif
                                          <td>{{$exercise->name}}</td>
                                          <td>{{$exercise->description}}</td>
                                          <td class="d-flex justify-between">
                                            <a href="{{route('exercises.edit', $exercise->id)}}" class="btn btn-primary mr-2">Edit</a>
                                            <form action="{{route('exercises.destroy', $exercise)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');" />
                                            </form>
                                          </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
@endsection