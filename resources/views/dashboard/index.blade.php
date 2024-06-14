@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exercises Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">All Exercises</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$exercises->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dumbbell fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Plans Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">All Plans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$plans->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Registered Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Registered Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$newRegisteredUsers->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-7 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Users Growth</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div id="usersGrowthChart"></div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Recent Users Table -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Users</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joined at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUsers as $user)
                            <tr>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->format('Y m d')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Content Row -->
    <div class="row">
            <!-- Bar Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Top 5 Exercises</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <div id="topExercisesChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Users Growth Chart
        var usersGrowthOptions = {
            series: [{
                name: 'Users',
                data: [
                    @foreach ($usersGrowth as $growth)
                        {{ $growth->count }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'area',
                height: 350
            },
            xaxis: {
                categories: [
                    @foreach ($usersGrowth as $growth)
                        '{{ $growth->month }}',
                    @endforeach
                ]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'User Growth Over Time',
                align: 'left'
            },
            subtitle: {
                text: 'Number of users registered per month',
                align: 'left'
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            }
        };

        var usersGrowthChart = new ApexCharts(document.querySelector("#usersGrowthChart"), usersGrowthOptions);
        usersGrowthChart.render();

        // Top Exercises Chart
        var topExercisesOptions = {
            series: [{
                name: 'Usage Count',
                data: [
                    @foreach ($topExercises as $exercise)
                        {{ $exercise->count }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            xaxis: {
                categories: [
                    @foreach ($topExercises as $exercise)
                        '{{ $exercise->name }}',
                    @endforeach
                ]
            },
            dataLabels: {
                enabled: false
            },
            title: {
                text: 'Top 5 Exercises',
                align: 'left'
            },
            subtitle: {
                text: 'Most used exercises in plans',
                align: 'left'
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            }
        };

        var topExercisesChart = new ApexCharts(document.querySelector("#topExercisesChart"), topExercisesOptions);
        topExercisesChart.render();
    });
</script>

@endsection
