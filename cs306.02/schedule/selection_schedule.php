<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}


</style>
<div align="center">
<br>
<?php

include "../config.php";


if (!empty($_POST['course_name']) and !empty($_POST['classid'])){
    $course_name = $_POST['course_name'];
    $sql_statement3 = "SELECT course_id FROM Courses WHERE course_name = '$course_name' ";
    $result3 = mysqli_query($db, $sql_statement3);
    $course_id = mysqli_fetch_assoc($result3)['course_id'];
    
    $classid = $_POST['classid'];

    $sql_statement = "SELECT * FROM CourseSchedule WHERE course_id = '$course_id' AND classid = '$classid' ";
}

else if (!empty($_POST['course_name']) ){
    $course_name = $_POST['course_name'];
    $sql_statement3 = "SELECT course_id FROM Courses WHERE course_name = '$course_name' ";
    $result3 = mysqli_query($db, $sql_statement3);
    $course_id = mysqli_fetch_assoc($result3)['course_id'];

    $sql_statement = "SELECT * FROM CourseSchedule WHERE course_id = '$course_id' ";
}

else if (!empty($_POST['classid'])){
    $classid = $_POST['classid'];

    $sql_statement = "SELECT * FROM CourseSchedule WHERE classid = '$classid' ";
}

else{
    echo "Fill all boundaries!";
}



if (!empty($sql_statement)){

    $result = mysqli_query($db, $sql_statement);
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Course id</td>";
    echo "<th>Course name</td>";
    echo "<th>Student id</td>";
    echo "<th>Student name</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $course_id = $row['course_id']; 
        $sql_statement3 = "SELECT course_name FROM Courses WHERE course_id = '$course_id' ";
        $result3 = mysqli_query($db, $sql_statement3);
        $course_name = mysqli_fetch_assoc($result3)['course_name'];
        $classid = $row['classid'];
        $begining = $row['begining'];
        $ending = $row['ending'];
        echo "<td>" .$course_name;
        echo "<td>" .$classid;
        echo "<td>" .$begining;
        echo "<td>" .$ending;
        echo "</tr>";

}
echo "</table>";

}
?>
