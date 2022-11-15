<?php
include "config.php";
session_start();

$username = $_SESSION['username'];
$role = $_SESSION['role'];
//echo "$username";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"> </script>

</head>

<body>
    <header class="container">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 center">
                <a class="logo_um">
                    <img src="um-logo.png" style="height: 150px; width: auto;">
                </a>
            </div>
            <div>
                <a class="blog-header-logo text-dark">UM Collaborative Course Calendar</a>
            </div>

        </div>
    </header>
    <nav class="navbar navbar-expand-lg" style="background-color: #061135 ;">
        <div class="container-fluid ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 50px; margin-right: 50px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disable" aria-current="page" style="color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if ($role === 'Student') {
                        ?>
                            <a class="nav-link" href="addCourseS.php" style="color:white;">Add Course</a>
                        <?php
                        } else { ?>
                            <a class="nav-link" href="addCourseL.php" style="color:white;">Add Course</a>
                        <?php
                        } ?>

                    </li>
                    <?php
                    if ($role === 'Student') {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="timetable.php" style="color:white;">My Timetable</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:white;">Group Project</a>
                    </li>';
                    }
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            External Links
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="https://spectrum.um.edu.my/login/index.php">Spectrum</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="https://myum.um.edu.my/">MyUM</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="https://umexpert.um.edu.my/">UMExpert</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <button style="background-color: transparent; border-color: transparent ;">
                        <a style="color:white;" href="login.php">Logout</a>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="row" style="margin-top: 5%;">
        <div class="col-1"></div>
        <div class="col-7">
            <?php


            $sqlSubject = "SELECT * FROM $username GROUP BY courseCode";
            $checkSubject = mysqli_query($mysqli, $sqlSubject);
            //echo $role;
            if (!$checkSubject) {
                echo "wtf";
            }
            if (mysqli_num_rows($checkSubject) === 0) {
                // echo "fail";
            } else {

                //$row = mysqli_fetch_assoc($checkSubject);
                while ($row = $checkSubject->fetch_assoc()) {
                    //echo $row['courseCode'];
                    $courseCode = $row['courseCode'];
                    $sql2 = "SELECT * FROM course WHERE courseCode = '$courseCode'";
                    $checkSubject2 = mysqli_query($mysqli, $sql2);
                    if (mysqli_num_rows($checkSubject2) === 0) {
                        echo "fail";
                    } else {
                        $row2 = mysqli_fetch_assoc($checkSubject2);
                        //echo $row2['day'];
            ?>
                        <div class="card" style=" margin-bottom: 2%;">
                            <div class="card-body">
                                <div class="subject-title">
                                    <h3><?php echo $row2['courseName'] ?></h3>
                                </div>
                                <div>
                                    <a href="timetable.php">
                                        View Course Planning
                                    </a>
                                </div>
                                <?php
                                if ($role === 'Student') {
                                ?>
                                    <div>
                                        <a href="#">
                                            Group Chat
                                        </a>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div>
                                        <a href="#">
                                            Schedule test
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>



                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <!-- <div class="col-7">
                <div class="card" style=" margin-bottom: 2%;">
                    <div class="card-body">
                        <div class="subject-title">
                            <h3>WIX 1001 Computing Mathematics</h3>
                        </div>
                        <div>
                            <a href="timetable.php">
                                View Course Planning
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                Schedule test
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card" style=" margin-bottom: 2%;">
                    <div class="card-body">
                        <div class="subject-title">
                            <h3>WIX 1002 Fundamentals of Programming</h3>
                        </div>
                        <div>
                            <a href="#">
                                View Course Planning
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                Schedule test
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card" style=" margin-bottom: 2%;">
                    <div class="card-body">
                        <div class="subject-title">
                            <h3>WIX 100Computer System and Organization</h3>
                        </div>
                        <div>
                            <a href="#">
                                View Course Planning
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                Schedule test
                            </a>
                        </div>

                    </div>
                </div> -->
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Upcoming Event
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Event 1</li>
                    <li class="list-group-item">Event 2</li>
                    <li class="list-group-item">Event 3</li>
                </ul>
            </div>
        </div>
    </main>
    <footer>

    </footer>

</body>

</html>