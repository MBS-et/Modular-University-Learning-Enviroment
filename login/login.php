<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="./login.css">
   <link href="img/main-logo.png"   rel="icon">
   
</head>
<body>
    <h2>MBS The Best E-learning Platform</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button >Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="../login/server/authenticate.php" method="POST">
                <h1>Sign in</h1>
                <select name="type" required>
                          <option disabled selected>Select your role</option>
                          <option>University</option>
                          <option>Instructor</option>
                          <option>Student</option>
                </select>
                <input type="text" id="username" name="username"    placeholder="Username" />
                <input type="password" id="password" name="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="submit"> Login </button>
                <a href=""></a>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./login.js"></script>
    
</body>
</html>