<?php
session_start();
include "config.php";

$username = $_POST['username'];
$role = $_POST['role'];
$courseCode = $_POST['courseCode'];
$occ = $_POST['occ'];

if (isset($_POST['courseName']) && isset($_POST['day']) && isset($_POST['timeS']) && isset($_POST['timeE'])) {
    $courseName = $_POST['courseName'];
    $day = $_POST['day'];
    $timeS = $_POST['timeS'];
    $timeS = str_replace(':', '', $timeS);
    $timeE = $_POST['timeE'];
    $timeE = str_replace(':', '', $timeE);
}


if ($role === 'Lecturer') {
    $check = "SELECT * FROM course WHERE username = '$username' AND courseCode = '$courseCode' AND courseName = '$courseName' AND occ = '$occ' AND day = '$day' AND timeS = '$timeS' AND timeE = '$timeE'";
    $resultCheck = mysqli_query($mysqli, $check);
    if (mysqli_num_rows($resultCheck) === 0) {
        $sql = "INSERT INTO course (username, courseCode, courseName, occ, day, timeS, timeE)
values(
    '$username',
    '$courseCode',
    '$courseName',
    '$occ',
    '$day',
    '$timeS',
    '$timeE'
)";
        mysqli_select_db($mysqli, 'calendar');
        $sql2 = "INSERT INTO $username (courseCode, occ) VALUES (
            '$courseCode',
            '$occ'
        )";
        mysqli_select_db($mysqli, 'calendar');
        $true1 = mysqli_query($mysqli, $sql);
        $true2 = mysqli_query($mysqli, $sql2);
        if ($true1 and $true2) {
            header("Location: addCourseL.php?Success");
        } else {
            if (!$true1) {
                echo "error1";
            }
            if (!$true2) {
                echo "error2";
            }
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            //echo ".$username.is here";
        }
    } else {
        header("Location: addCourseL.php?Course already there");
    }
} else {
    $checkOcc = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ'";
    $occCheck = mysqli_query($mysqli, $checkOcc);
    if (mysqli_num_rows($occCheck) > 0) {
        $sql = "INSERT INTO $username (courseCode, occ) VALUES(
            '$courseCode',
            '$occ'
        )";
        mysqli_select_db($mysqli, 'calendar');
        if (mysqli_query($mysqli, $sql)) {
            header("Location: addCourseS.php?Success");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            //echo ".$username.is here";
        }
    } else {
        // echo $courseCode;
        // echo $occ;
        header("Location: addCourseS.php?Course not available");
    }
}
