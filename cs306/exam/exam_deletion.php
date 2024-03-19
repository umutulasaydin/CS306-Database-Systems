
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

$sql_statement = "SELECT * FROM EXAM";

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
//    echo  $course_name . " // " ;


    $classid = $row['classid'];
    $sql_statement2 = "SELECT * FROM Class WHERE classid = '$classid' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $Capacity = $row2['Capacity'];
//    echo $classid . " " . $Capacity . " // " ;

    $inst_id = $row['inst_id'];
    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $inst_name = $row2['inst_name'];
//    echo $inst_name . " // " ;
    
    $obs_id = $row['obs_id'];
    $sql_statement2 = "SELECT * FROM Observer WHERE obs_id = '$obs_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $obs_name = $row2['obs_name'];
//    echo $obs_name . " // " ;

    $exam_start = $row['exam_start'];
    $exam_finish = $row['exam_finish'];
//    echo $exam_start . "--" . $exam_finish;
    
    echo "<tr>";
    echo "<td>" .$course_name;
    echo "<td>" .$classid;
    echo "<td>" .$inst_name;
    echo "<td>" .$obs_name;
    echo "<td>" .$exam_start;
    echo "<td>" .$exam_finish;
    echo "</tr>";

} 

echo "</table>";
?>

<br><br><br>


<form method="POST">
<select name="ids">

<?php

$sql_command = "SELECT * FROM Courses";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $course_id = $id_rows['course_id'];
    $course_name = $id_rows['course_name'];

    echo "<option value=$course_id>" . $course_id . " " . $course_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>

<br>
</form>





<form action="delete_exam.php" method="POST">
<select name = "ids2">

<?php
$course_id = $_POST['ids'];
$sql_command = "SELECT * FROM EXAM WHERE course_id = '$course_id' ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $classid = $id_rows['classid'];
    $inst_id = $id_rows['inst_id'];
    $course_id = $id_rows['course_id'];
    $exam_start = $id_rows['exam_start'];
    $exam_finish = $id_rows['exam_finish'];

    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $course_name = $row2['course_name'];

    $sql_statement2 = "SELECT * FROM Class WHERE classid = '$classid' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $Capacity = $row2['Capacity'];

    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $inst_name = $row2['inst_name'];


    $id2 = explode(" ",$exam_start);
    $id = strval($classid);
    $id .= strval("/");
    $id .= strval($id2[0]);
    $id .= strval("/");
    $id .= strval($id2[1]);
    echo "<option value=$id >" . $classid . " " . $Capacity . " // "  . $inst_name . " // "  . $exam_start . "--" . $exam_finish . "</option>";
    
}

?>
</select>
<button>DELETE</button>
</form>


<br><br><br>


<form method="POST">
<select name="ids3">


<?php
$sql_command = "SELECT * FROM Class";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $classid = $id_rows['classid'];
    $Capacity = $id_rows['Capacity'];

    echo "<option value=$classid>" . $classid . " " . $Capacity . "</option>";
}

?>

</select>
<button>CHOOSE</button>

<br>

</form>



<form action="delete_exam.php" method="POST">
<select name ="ids4">

<?php
$classid = $_POST["ids3"];
$sql_command = "SELECT * FROM EXAM WHERE classid = '$classid' ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $classid = $id_rows['classid'];
    $inst_id = $id_rows['inst_id'];
    $course_id = $id_rows['course_id'];
    $exam_start = $id_rows['exam_start'];
    $exam_finish = $id_rows['exam_finish'];

    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $course_name = $row2['course_name'];

    $sql_statement2 = "SELECT * FROM Class WHERE classid = '$classid' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $Capacity = $row2['Capacity'];

    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $inst_name = $row2['inst_name'];

    $id2 = explode(" ",$exam_start);
    $id = strval($classid);
    $id .= strval("/");
    $id .= strval($id2[0]);
    $id .= strval("/");
    $id .= strval($id2[1]);
    
    echo "<option value=$id >" . $course_name . " // "  . $inst_name . " // "  . $exam_start . "--" . $exam_finish ."</option>";
    
}

?>

</select>
<button>DELETE</button>
</form>

