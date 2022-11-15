<?php
include_once('config.php');
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];

//echo $username;
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
    <style>
        table,
        td {
            border: 2px solid #000000;
            border-collapse: collapse;

        }

        .time {
            border: red;
        }
    </style>
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
                        <a class="nav-link" href="home.php" aria-current="page" style="color:white;">Home</a>
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
    <main>
        <br>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-7">
                <table align="center">
                    <!--<caption>Timetable</caption>-->
                    <tr>
                        <td class="time" align="center" height="50" width="100"><br>
                            <b>Day/Period</b></br>
                        </td>
                        <td class="time" align="center" height="50" width="100">
                            <b>0800-0900</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>0900-1000</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1000-1100</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1100-1200</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1200-1300</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1300-1400</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1400-1500</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1500-1600</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1600-1700</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1700-1800</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1800-1900</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>1900-2000</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>2000-2100</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>2100-2200</b>
                        </td>
                        <td align="center" height="50" width="100">
                            <b>2200-2300</b>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Monday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];
                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Monday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                $check = false;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];

                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    //echo $timeS . " " . $time[$x];
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan >= 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>
                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>
                                        <?php

                                        ?>
                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }



                        //print_r($time);
                        ?>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Tuesday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];
                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Tuesday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            //echo mysqli_num_rows($sqlNewResult);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                $check = false;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];
                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan > 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>
                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>

                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }
                        //echo $index . " " . count($time);
                        //print_r($time);
                        ?>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Wednesday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];
                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Wednesday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            //echo mysqli_num_rows($sqlNewResult);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                $check = false;
                                $index = 0;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];
                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan > 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>

                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>
                                        <?php

                                        ?>
                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }
                        //echo $index . " " . count($time);


                        //print_r($time);
                        ?>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Thursday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];

                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Thursday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            //echo mysqli_num_rows($sqlNewResult);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                //$index = 0;
                                $check = false;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];
                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan > 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>

                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>
                                        <?php

                                        ?>
                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }
                        //echo $index . " " . count($time);


                        //print_r($time);
                        ?>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Friday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];
                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Friday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            //echo mysqli_num_rows($sqlNewResult);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                $check = false;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];
                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan > 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>

                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>
                                        <?php

                                        ?>
                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }
                        //echo $index . " " . count($time);


                        //print_r($time);
                        ?>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Saturday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];
                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Saturday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            //echo mysqli_num_rows($sqlNewResult);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                $check = false;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];
                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan > 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>

                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>
                                        <?php

                                        ?>
                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }
                        //echo $index . " " . count($time);


                        //print_r($time);
                        ?>
                    </tr>
                    <tr>
                        <td align="center" height="50">
                            <b>Sunday</b>
                        </td>
                        <?php
                        $sql = "SELECT * FROM $username";
                        $result = mysqli_query($mysqli, $sql);
                        $time = array("0800", "0900", "1000", "1100", "1200", "1300", "1400", "1500", "1600", "1700", "1800", "1900", "2000", "2100", "2200");
                        $count = 0;
                        $check = true;
                        while ($row = $result->fetch_assoc()) {
                            $courseCode = $row['courseCode'];
                            $occ = $row['occ'];
                            $sqlnew = "SELECT * FROM course WHERE courseCode = '$courseCode' AND occ = '$occ' AND day = 'Sunday'";
                            $sqlNewResult = mysqli_query($mysqli, $sqlnew);
                            //echo mysqli_num_rows($sqlNewResult);
                            if (mysqli_num_rows($sqlNewResult) > 0) {
                                $check = false;
                                $sqlNewRow = mysqli_fetch_assoc($sqlNewResult);
                                $timeS = $sqlNewRow['timeS'];
                                for ($x = $count; $x < count($time); $x++) {
                                    //echo $x;
                                    if ($timeS === $time[$x]) {

                                        $colSpan = $sqlNewRow['timeE'] - $sqlNewRow['timeS'];
                                        $course1 = $sqlNewRow['courseName'];
                                        if ($colSpan > 100) {
                                            //unset($time[$x + 1]);
                                            $count += $colSpan / 100 + 1;
                                            //echo $x;
                                        }
                        ?>
                                        <td colspan="<?php echo $colSpan / 100 ?> " align="center" height="50"><?php echo $course1 ?></td>

                                    <?php
                                        $index =  array_search($timeS, $time);
                                        $index += $colSpan / 100;
                                        break;
                                    } else {
                                    ?>
                                        <?php

                                        ?>
                                        <td align="center" height="50"></td>
                                <?php
                                        //break;

                                    }
                                }
                            }
                        }
                        if ($check) {
                            $index = 0;
                        }
                        if ($index < count($time)) {
                            for ($i = $index; $i < count($time); $i++) {
                                ?>
                                <td align="center" height="50"></td>
                        <?php
                            }
                        }
                        //echo $index . " " . count($time);


                        //print_r($time);
                        ?>
                    </tr>
                </table>
            </div>
            <div class="col-3" align=center>
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
        </div>


    </main>
</body>

</html>