@extends('dashboard.layouts.template')
@section('content')
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="{{route('plans.create')}}" class="btn btn-primary">Add New Plan</a>

                    <!-- DataTales Example -->
                    <div class="card shadow my-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Plans</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Duration</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($plans as $plan)  
                                      <tr>
                                        @if ($plan->image)
                                          <td><img src="{{asset('assets/images/plans/'.$plan->image)}}" alt="Exercise Image" width="250" height="250"></td>
                                        @else
                                          <td><img src="{{asset('assets/images/close-up-man-exercising-after-online-instructor-2.png')}}" alt="Exercise Image" width="250" height="250"></td>
                                        @endif
                                          <td>{{$plan->name}}</td>
                                          <td>{{$plan->description}}</td>
                                          <td>{{$plan->duration}} Month</td>
                                          <td>{{$plan->user->username}}</td>
                                          <td class="d-flex justify-between">
                                            <a href="{{route('plans.edit', $plan)}}" class="btn btn-primary mr-2">Edit</a>
                                            <a href="{{route('plans.show', $plan)}}" class="btn btn-info mr-2">View</a>
                                            <form action="{{route('plans.destroy', $plan)}}" method="POST">
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