<?php

session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['role'];

if (empty($username)) {
    header("Location: login.php?error=Username is required");
    exit();
} else if (empty($password)) {
    header("Location: login.php?error=Password is required");
    exit();
} else {

    mysqli_select_db($mysqli, 'calendar');
    $sql = "CREATE TABLE `" . $username . "` (
        entryID int NOT NULL AUTO_INCREMENT,
        courseCode varchar(10),
        occ int(2),
        PRIMARY KEY (entryID)
        )";

    $sql1 = "INSERT INTO user (username,password,status)
            VALUES('$username','$password','$status')";

    if (mysqli_query($mysqli, $sql)) {
        if (mysqli_query($mysqli, $sql1)) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = $status;
            header("Location: home.php");
            exit();
        } else {
            header("Location: login.php?error='$username' not inserted");
            exit();
        }
    } else {
        echo ("Error description: " . $mysqli->error);
        exit();
    }
}
