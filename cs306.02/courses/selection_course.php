
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


if (!empty($_POST['course_name'])){
    $course_name = $_POST['course_name'];

    $sql_statement = "SELECT * FROM Courses WHERE course_name LIKE '$course_name%' ";

    $result = mysqli_query($db, $sql_statement);
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Course id</td>";
    echo "<th>Course name</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) { 
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        echo "
        <tr>
            <td>".$course_id."</td>
            <td>".$course_name."</td>

        </tr>";
    }
    echo "</table>";
}

else{
    echo "Fill all boundaries!";
}