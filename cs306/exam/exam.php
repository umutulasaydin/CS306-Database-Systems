
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
<body>

<div align="center">

<h1>You are in Book an Exam Page</h1>

<p>Click this link to Add an Exam </p>
<form action="http://localhost/cs306/exam/exam_insertion.php">
    <input type="submit" value="ADD AN EXAM" />
</form>
<p>Click this link to Delete an Exam </p>
<form action="http://localhost/cs306/exam/exam_deletion.php">
    <input type="submit" value="DELETE AN EXAM" />
</form>



<br><br><br>


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
    echo "<tr>";
    $course_id = $row['course_id'];
    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $course_name = $row2['course_name'];
    echo "<td>" .$course_name;
//    echo  $course_name . " // " ;


    $classid = $row['classid'];
    $sql_statement2 = "SELECT * FROM Class WHERE classid = '$classid' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $Capacity = $row2['Capacity'];
    echo "<td>" .$classid;
//    echo $classid . " " . $Capacity . " // " ;

    $inst_id = $row['inst_id'];
    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $inst_name = $row2['inst_name'];
    echo "<td>" .$inst_name;
//    echo $inst_name . " // " ;
    
    $obs_id = $row['obs_id'];
    $sql_statement2 = "SELECT * FROM Observer WHERE obs_id = '$obs_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $obs_name = $row2['obs_name'];
    echo "<td>" .$obs_name;
//    echo $obs_name . " // " ;

    $exam_start = $row['exam_start'];
    $exam_finish = $row['exam_finish'];
    echo "<td>" .$exam_start;
    echo "<td>" .$exam_finish;
//    echo $exam_start . "--" . $exam_finish. "<br>";
    echo "</tr>";
    
} 
echo "</table>"
?>


<br><br><br><br>
<h3> Filter of exam selection </h3>


<form action="selection_exam.php" method="POST">
    Course Name:
    <input type="text" id="course_name" name="course_name">
    Class Name:
    <input type="text" id="classid" name="classid">
    Instructor Name:
    <input type="text" id="inst_name" name="inst_name">
    <input type="submit" value="Filter">
</form>

</div>
</body>


<h4> Click this to get back to the main page</h4>
<form action="http://localhost/cs306/?">
    <input type="submit" value="Return to main page" />
</form>

</html>
