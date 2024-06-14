<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles-login.css')}}">
    <title>SPORTHUB | Login</title>
</head>

<body>

    <div class="container active" id="container">
        <div class="form-container sign-in">

            <form method="POST" action="{{route('register')}}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                @endif
                @csrf
                <h1>Create Account</h1>
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname" placeholder="Last Name">
                <input type="password" name="password" placeholder="Password">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <a href="{{route('login')}}"><button class="hidden">Sign In</button></a>
                </div>
            </div>
        </div>
    </div>    
</body>

</html>