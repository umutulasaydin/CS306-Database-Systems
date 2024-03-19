

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


if (!empty($_POST['course_id']) and !empty($_POST['inst_id'])){
    $course_id = $_POST['course_id'];
    $inst_id = $_POST['inst_id'];

    $sql_statement = "SELECT * FROM Teach WHERE course_id = '$course_id' AND inst_id = '$inst_id' ";
}

else if (!empty($_POST['course_id']) ){
    $course_id = $_POST['course_id'];

    $sql_statement = "SELECT * FROM Teach WHERE course_id = '$course_id' ";
}

else if (!empty($_POST['inst_id'])){
    $inst_id = $_POST['inst_id'];

    $sql_statement = "SELECT * FROM Teach WHERE inst_id = '$inst_id' ";
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
    echo "<th>Instructor id</td>";
    echo "<th>Instructor name</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) { 
        $course_id = $row['course_id'];
        $inst_id = $row['inst_id'];
        
        $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $course_name = $row2['course_name'];

        echo "<td>" .$course_id;
        echo "<td>" .$course_name;
    }

    $inst_id = $row['inst_id']; 
    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $inst_name = $row2['inst_name'];

        echo "<td>" .$inst_id;
        echo "<td>" .$inst_name;
    }
    echo "</tr>";
}
echo "</table>";
}




