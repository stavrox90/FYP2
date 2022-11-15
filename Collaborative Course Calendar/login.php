<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/bootstrap.bundle.min.js">
    </script>
</head>

<body style="background-image: url('Dewan Tuanku Canselor DTC Universiti Malaya UM Kuala Lumpur KL.jpg');">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="register.php" method="POST">
                <h1>Create Account</h1>
                <br>
                <span>Please Enter Your
                    UMMail (staff) / Siswa Mail (student) username</span>
                <input type="text" name="username" class="form-control" required="" placeholder="Username (Eg: siti_laila)" />
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <select class="form-select" name="role">
                    <option value="Student">Student</option>
                    <option value="Lecturer">Lecturer</option>
                </select>
                <br>
                <br>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="verifyLogin.php" method="POST">
                <h1>Sign in</h1>
                <br>
                <span>Please Enter Your UMMail (staff) / Siswa Mail (student) username</span>
                <input type="text" name="username" class="form-control" required="" placeholder="Username (Eg: siti_laila)" />
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <select class="form-select" name="role">
                    <option value="Student">Student</option>
                    <option value="Lecturer">Lecturer</option>
                </select>
                <br>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>If you already have an account, click here to login</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>New here?</h1>
                    <p>Register with us to manage your study semester!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>

</body>

</html>