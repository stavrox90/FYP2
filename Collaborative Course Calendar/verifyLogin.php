<?php
session_start();
include "config.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {

        $sql = "SELECT * FROM user WHERE username='$username' AND password ='$password'";

        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            //password_verify($_POST['password'], $user->password)
            //if ($row['Email'] === $email && $row['Password1'] === $pass)
            if ($row['username'] === $username && ($row['password'] === $password)) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['role'] = $row['status'];
                header("Location: home.php");
                exit();
            } else {
                $_SESSION['fail'] = 'Invalid email or password!';
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['fail'] = 'Invalid email or password!';
            header("Location: login.php");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}
