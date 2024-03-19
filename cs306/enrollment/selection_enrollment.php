
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
<br><br>


<?php

include "../config.php";


if (!empty($_POST['course_id']) and !empty($_POST['stu_id'])){
    $course_id = $_POST['course_id'];
    $stu_id = $_POST['stu_id'];

    $sql_statement = "SELECT * FROM Enrollment WHERE course_id = '$course_id' AND stu_id = '$stu_id' ";
}

else if (!empty($_POST['course_id']) ){
    $course_id = $_POST['course_id'];

    $sql_statement = "SELECT * FROM Enrollment WHERE course_id = '$course_id' ";
}

else if (!empty($_POST['stu_id'])){
    $stu_id = $_POST['stu_id'];

    $sql_statement = "SELECT * FROM Enrollment WHERE stu_id = '$stu_id' ";
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

        $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
        $result2 = mysqli_query($db, $sql_statement2);
        echo "<tr>";
        while($row2 = mysqli_fetch_assoc($result2)){
            $course_name = $row2['course_name'];

            echo "<td>" .$course_id;
        echo "<td>" .$course_name;
    }
        $stu_id = $row['stu_id'];
        
        $sql_statement2 = "SELECT * FROM Student WHERE stu_id = '$stu_id' ";
        $result2 = mysqli_query($db, $sql_statement2);
        while($row2 = mysqli_fetch_assoc($result2)){
            $stu_name = $row2['stu_name'];

            echo "<td>" .$stu_id;
            echo "<td>" .$stu_name;
        }
        echo "</tr>";
}
echo "</table>";
}




