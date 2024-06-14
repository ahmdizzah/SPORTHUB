    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-text mx-3">SPORTHUB</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('exercises.index')}}">
                    <i class="fa-solid fa-dumbbell"></i>
                    <span>Exercises</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('plans.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Plans</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
  

        </ul>