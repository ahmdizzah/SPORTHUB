    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a>SPORTHUB</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li class="link"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="link"><a href="{{route('exercises.index')}}">Exercise</a></li>
        <li class="link"><a href="{{route('plans.index')}}">Plans</a></li>
        @if(!Auth::check())
        <li class="link"><a href="{{route('login')}}">Login</a></li>
        @else
        <li class="link"><a href="{{route('logout')}}">Logout</a></li>
        <span>
          <li class="profile-link">
            <a id="profile-link" href="{{route('profile.index')}}">
              @if (Auth::user()->image)
                <img src="{{asset('assets/images/users/'.Auth::user()->image)}}" alt="Profile Picture">
                @else
                <img src="{{asset('assets\images\profile.png')}}" alt="Profile Picture">
              @endif
            </a>
          </li>
        </span>
        @endif
        <li class="link"><button class="btn">Download</button></li>
      </ul>
    </nav>