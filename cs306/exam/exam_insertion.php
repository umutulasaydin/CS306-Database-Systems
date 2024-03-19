<html>
<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
th, td {
  padding: 5px;
  text-align: center;
}

</style>
<div align="center">


<?php

include "../config.php";

?>

Choose Course:
<form method="POST">
<select name="ids">

<?php

$sql_command = "SELECT * FROM Courses";
$my_result = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($my_result)){
    $course_id = $id_rows['course_id'];
    $course_name = $id_rows['course_name'];

    echo "<option value=$course_id>" . $course_id . " " . $course_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>
</form>

<br><br>


Choose Instructor:
<form method="POST">
<select name="ids2">

<?php
$course_id = $_POST['ids'];
$sql_command = "SELECT * FROM Instructor WHERE inst_id IN (SELECT inst_id FROM Teach WHERE course_id = '$course_id') ";
$my_result = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($my_result)){
    $inst_id = $id_rows['inst_id'];
    $inst_name = $id_rows['inst_name'];
    $id = strval($course_id);
    $id .= strval("/");
    $id .= strval($inst_id);
    echo "<option value=$id>" . $inst_id . " " . $inst_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>
</form>


<br><br>

<form method="POST">
Class:
<select name="ids3">


<?php

$sql_command = "SELECT * FROM Class";
$my_result = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($my_result)){
    $id = $_POST['ids2'];
    $classid = $id_rows['classid'];
    $Capacity = $id_rows['Capacity'];
    $id .= strval("/");
    $id .= strval($classid);
    echo "<option value=$id>" . $classid . " " . $Capacity . "</option>";
}

?>

</select>
<button>CHOOSE</button>
</form>


<?php



if (isset($_POST['ids3'])){

    $id = $_POST['ids3'];
    
    $id3 = explode("/", $id);
    $course_id = $id3[0];
    $inst_id = $id3[1];
    $classid = $id3[2];


    $sql_command = "SELECT * FROM CourseSchedule WHERE classid = '$classid' AND course_id != '$course_id' ";

    $sql_command2 = "SELECT * FROM EXAM WHERE classid = '$classid' ";

    $my_result = mysqli_query($db, $sql_command);

    $my_result2 = mysqli_query($db, $sql_command2);
    
    echo "Dates and classes that is not available <br>";
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Coursename</td>";
    echo "<th>Classroom</td>";
    echo "<th>Start date</td>";
    echo "<th>End date</td>";
    echo "<th>Observer id </th>";
    echo "</tr>";

    while($id_rows = mysqli_fetch_assoc($my_result)){
        $class = $id_rows['classid'];
        $course = $id_rows['course_id'];
        $sql_command3 = "SELECT course_name FROM Courses WHERE course_id = '$course' ";
        $my_result3 = mysqli_query($db, $sql_command3);
        $coursename = mysqli_fetch_assoc($my_result3)['course_name'];
        $begin = $id_rows['begining'];
        $end = $id_rows['ending'];

        echo $class . " " . $coursename . " " . $begin . " " . $end . "<br>";
        echo "<tr>";
        echo "<td>" .$coursename;
        echo "<td>" .$class;
        echo "<td>" .$begin;
        echo "<td>" .$end;
        echo "</tr>";
    }

    
    while($id_rows = mysqli_fetch_assoc($my_result2)){
        $class = $id_rows['classid'];

        $course = $id_rows['course_id'];
        $sql_command3 = "SELECT course_name FROM Courses WHERE course_id = '$course' ";
        $my_result3 = mysqli_query($db, $sql_command3);
        $coursename = mysqli_fetch_assoc($my_result3)['course_name'];



        $begin = $id_rows['exam_start'];
        $end = $id_rows['exam_finish'];

        $obs = $id_rows['obs_id'];
        $sql_command4 = "SELECT obs_name FROM Observer WHERE obs_id = '$obs' ";


//        echo $class . " " . $coursename . " " . $begin . " " . $end . " " . $obs . "<br>";
        echo "<tr>";
        echo "<td>" .$coursename;
        echo "<td>" .$class;
        echo "<td>" .$begin;
        echo "<td>" .$end;
        echo "<td>" .$obs;
        echo "</tr>";
    }
    echo "</table>";
}



?>



<br><br>

Choose Time and Observer:
<br>
<form action="insertion_exam.php" method="POST">
Exam Start:
<input type="datetime" id="exam_start" name="exam_start">
Exam Finish:
<input type="datetime" id="exam_finish" name="exam_finish">
Observer:
<select name="ids4">

<?php


$sql_command = "SELECT * FROM Observer";
$my_result = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($my_result)){
    $id = $_POST['ids3'];
    $obs_id = $id_rows['obs_id'];
    $obs_name = $id_rows['obs_name'];
    $id .= "/";
    $id .= $obs_id;
    echo "<option value=$id>" . $obs_id . " "  . $obs_name . " " . "</option>";
}

?>

</select>

<button>CHOOSE</button>
</form>




</html>

