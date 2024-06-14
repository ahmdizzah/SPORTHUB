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

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{route('login')}}">
                <h1>Sign In</h1>
                @csrf
                <input name="email" type="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <a href="">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <a href="{{route('register')}}"><button class="hidden">Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/script-login.js')}}"></script>
    
</body>

</html>