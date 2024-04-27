<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('assets\css\styles-user.css')}}" />
  <title>SPORTHUB</title>
</head>

<body>
  <header class="header">
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
        <li class="link"><a href="#home">Dashboard</a></li>
        <li class="link"><a href="#features">Features</a></li>
        <li class="link"><a href="#plans">Plans</a></li>
        @if(!Auth::check())
        <li class="link"><a href="{{route('login')}}">Login</a></li>
        @else
        <span>
          <li class="profile-link"><a id="profile-link" href=""><img src="{{asset('assets\images\profile.png')}}" alt="Profile Picture"></a></li>
        </span>
        <li class="link"><a href="{{route('logout')}}">Logout</a></li>
        @endif
        <li class="link"><button class="btn">Download</button></li>
      </ul>
    </nav>
    <div class="section__container header__container" id="home">
      <div class="header__image">
        <img src="{{asset('assets\images\full-shot-man-doing-yoga-mat-1-bg.png')}}" alt="header" />
      </div>
      <div class="header__content">
        <h1 class="section__header">SPORTHUB</h1>
        <h4>Build your own workout routine just at home </h4>
        <p>
          lazy to go to gym? Just download our app and built your muscle and keep healthy just from your comfortable home.
        </p>
        <div class="header__btn">
          <button class="btn">Learn More</button>
        </div>
      </div>
    </div>
  </header>

  <section class="section__container class__container" id="features">
    <h2 class="section__header">Pick our top lineup workout exercises</h2>
    <div class="class__grid">
      <div class="class__card">
        <img src="{{asset('assets\images\dot-bg.png')}}" alt="bg" class="class__bg" />
        <img src="{{asset('assets\images\young-man-making-sport-exercises-home-1-bg.png')}}" alt="class" />
        <div class="class__content">
          <h4>Arm Program</h4>
        </div>
      </div>
      <div class="class__card">
        <img src="{{asset('assets\images\dot-bg.png')}}" alt="bg" class="class__bg" />
        <img src="{{asset('assets\images\man-fitness-workout-shirtless-man-doing-stretching-home-1-bg.png')}}" alt="class" />
        <div class="class__content">
          <h4>Abs Program</h4>
        </div>
      </div>
      <div class="class__card">
        <img src="{{asset('assets\images\dot-bg.png')}}" alt="bg" class="class__bg" />
        <img src="{{asset('assets\images\young-man-making-sport-exercises-home-2-1-bg.png')}}" alt="class" />
        <div class="class__content">
          <h4>Back Program</h4>
        </div>
      </div>
      <div class="class__card">
        <img src="{{asset('assets\images\dot-bg.png')}}" alt="bg" class="class__bg" />
        <img src="{{asset('assets\images\young-serious-sports-man-warming-up-gym-1.png')}}" alt="class" />
        <div class="class__content">
          <h4>Full Body Program</h4>
        </div>
      </div>
    </div>
  </section>

  <section class="section__container price__container" id="plans">
    <h2 class="section__header">Our Ideal Workout Plan</h2>
    <div class="price__grid">
      <div class="price__card">
        <div class="price__content">
          <h4>1 Month Program</h4>
          <img src="{{asset('assets\images\close-up-man-exercising-after-online-instructor-2.png')}}" alt="price" />
          <hr />
          <h4>Key Features</h4>
          <p>Smart workout plan</p>
          <p>At home workouts</p>
        </div>
        <button class="btn">Start Your Program</button>
      </div>
      <div class="price__card">
        <div class="price__content">
          <h4>6 Months Program</h4>
          <img src="{{asset('assets\images\close-up-man-exercising-after-online-instructor.png')}}" alt="price" />
          <hr />
          <h4>Key Features</h4>
          <p>PRO Gyms</p>
          <p>Smart workout plan</p>
          <p>At home workouts</p>
        </div>
        <button class="btn">Start Your Program</button>
      </div>
      <div class="price__card">
        <div class="price__content">
          <h4>12 Months Program</h4>
          <img src="{{asset('assets\images\close-up-man-exercising-after-online-instructor_23-2149240208.jpg')}}" alt="price" />
          <hr />
          <h4>Key Features</h4>
          <p>ELITE Gyms & Classes</p>
          <p>PRO Gyms</p>
          <p>Smart workout plan</p>
          <p>At home workouts</p>
          <p>Personal Training</p>
        </div>
        <button class="btn">Start Your Program</button>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="footer__logo">
          <a>SPORTHUB</a>
        </div>
        <p>
          Take the first step towards a healthier, stronger you with our
          unbeatable pricing plans. Let's sweat, achieve, and conquer
          together!
        </p>
        <div class="footer__socials">
          <a href="#"><i class="ri-facebook-fill"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Company</h4>
        <div class="footer__links">
          <a href="#">Business</a>
          <a href="#">Franchise</a>
          <a href="#">Partnership</a>
          <a href="#">Network</a>
        </div>
      </div>
      <div class="footer__col">
        <h4>About Us</h4>
        <div class="footer__links">
          <a href="#">Blogs</a>
          <a href="#">Security</a>
          <a href="#">Careers</a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <div class="footer__links">
          <a href="#">Contact Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">BMI Calculator</a>
        </div>
      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2023 Web Design Mastery. All rights reserved.
    </div>
  </footer>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="{{asset('assets\js\script.js')}}"></script>
</body>

</html>