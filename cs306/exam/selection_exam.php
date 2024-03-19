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

<?php

include "../config.php";

if (!empty($_POST['course_name']) and !empty($_POST['classid']) and !empty($_POST['inst_name']))
{
    $course_name = $_POST['course_name'];
    $inst_name = $_POST['inst_name'];

    $sql_statement = "SELECT course_id FROM Courses WHERE course_name = '$course_name' ";
    $result = mysqli_query($db, $sql_statement);
    $course_id = mysqli_fetch_assoc($result)['course_id'];

    $sql_statement = "SELECT inst_id FROM Instructor WHERE inst_name = '$inst_name' ";
    $result = mysqli_query($db, $sql_statement);
    $inst_id = mysqli_fetch_assoc($result)['inst_id'];

    $classid = $_POST['classid'];

    $sql_statement = "SELECT * FROM EXAM WHERE course_id = '$course_id' AND inst_id = '$inst_id' AND classid = '$classid' ";
}

else if (!empty($_POST['course_name']) and !empty($_POST['classid']))
{
    $course_name = $_POST['course_name'];

    $sql_statement = "SELECT course_id FROM Courses WHERE course_name = '$course_name' ";
    $result = mysqli_query($db, $sql_statement);
    $course_id = mysqli_fetch_assoc($result)['course_id'];

    $classid = $_POST['classid'];

    $sql_statement = "SELECT * FROM EXAM WHERE course_id = '$course_id' AND classid = '$classid' ";
}

else if (!empty($_POST['course_name']) and !empty($_POST['inst_name']))
{
    $course_name = $_POST['course_name'];
    $inst_name = $_POST['inst_name'];

    $sql_statement = "SELECT course_id FROM Courses WHERE course_name = '$course_name' ";
    $result = mysqli_query($db, $sql_statement);
    $course_id = mysqli_fetch_assoc($result)['course_id'];

    $sql_statement = "SELECT inst_id FROM Instructor WHERE inst_name = '$inst_name' ";
    $result = mysqli_query($db, $sql_statement);
    $inst_id = mysqli_fetch_assoc($result)['inst_id'];

    $sql_statement = "SELECT * FROM EXAM WHERE course_id = '$course_id' AND inst_id = '$inst_id' ";
}

else if (!empty($_POST['classid']) and !empty($_POST['inst_name']))
{
    $inst_name = $_POST['inst_name'];

    $sql_statement = "SELECT inst_id FROM Instructor WHERE inst_name = '$inst_name' ";
    $result = mysqli_query($db, $sql_statement);
    $inst_id = mysqli_fetch_assoc($result)['inst_id'];

    $classid = $_POST['classid'];

    $sql_statement = "SELECT * FROM EXAM WHERE inst_id = '$inst_id' AND classid = '$classid' ";
}

else if ( !empty($_POST['course_name']))
{
    $course_name = $_POST['course_name'];

    $sql_statement = "SELECT course_id FROM Courses WHERE course_name = '$course_name' ";
    $result = mysqli_query($db, $sql_statement);
    $course_id = mysqli_fetch_assoc($result)['course_id'];

    $sql_statement = "SELECT * FROM EXAM WHERE course_id = '$course_id' ";
}

else if (!empty($_POST['classid']))
{
    $classid = $_POST['classid'];

    $sql_statement = "SELECT * FROM EXAM WHERE classid = '$classid' ";
}

else if (!empty($_POST['inst_name']))
{
    $inst_name = $_POST['inst_name'];

    $sql_statement = "SELECT inst_id FROM Instructor WHERE inst_name = '$inst_name' ";
    $result = mysqli_query($db, $sql_statement);
    $inst_id = mysqli_fetch_assoc($result)['inst_id'];

    $sql_statement = "SELECT * FROM EXAM WHERE inst_id = '$inst_id' ";
}

if (!empty($sql_statement)){

    $result = mysqli_query($db, $sql_statement);

    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Coursename</td>";
    echo "<th>Classroom</td>";
    echo "<th>Instructor</td>";
    echo "<th>Observer</td>";
    echo "<th>Start date</td>";
    echo "<th>End date</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) { 

        $course_id = $row['course_id'];
        $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
        $result2 = mysqli_query($db, $sql_statement2);
        $row2 = mysqli_fetch_assoc($result2);
        $course_name = $row2['course_name'];
//        echo  $course_name . " // " ;
    
    
        $classid = $row['classid'];
        $sql_statement2 = "SELECT * FROM Class WHERE classid = '$classid' ";
        $result2 = mysqli_query($db, $sql_statement2);
        $row2 = mysqli_fetch_assoc($result2);
        $Capacity = $row2['Capacity'];
//        echo $classid . " " . $Capacity . " // " ;
    
        $inst_id = $row['inst_id'];
        $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
        $result2 = mysqli_query($db, $sql_statement2);
        $row2 = mysqli_fetch_assoc($result2);
        $inst_name = $row2['inst_name'];
//        echo $inst_name . " // " ;
        
        $obs_id = $row['obs_id'];
        $sql_statement2 = "SELECT * FROM Observer WHERE obs_id = '$obs_id' ";
        $result2 = mysqli_query($db, $sql_statement2);
        $row2 = mysqli_fetch_assoc($result2);
        $obs_name = $row2['obs_name'];
//        echo $obs_name . " // " ;
    
        $exam_start = $row['exam_start'];
        $exam_finish = $row['exam_finish'];
//        echo $exam_start . "--" . $exam_finish;
        
        echo "<tr>";
        echo "<td>" .$course_name;
        echo "<td>" .$classid;
        echo "<td>" .$inst_name;
        echo "<td>" .$obs_name;
        echo "<td>" .$exam_start;
        echo "<td>" .$exam_finish;
        echo "</tr>";
        
}
    }
else{
    echo "Failure";
}
   
?>
</html>
