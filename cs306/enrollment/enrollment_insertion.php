<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
th, td {
  padding: 2px;
  text-align: center;
}
* {
  box-sizing: border-box;
}

.row {
  display: flex;
  margin-left:10px;
  margin-right:0px;
}

.column {
  flex: 2%;
  padding: 0px;
}

table {
  border-collapse: collapse;
  border-spacing: 1;
  width: 50%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 7px;
}


</style>
<div align="center">

<?php

include "../config.php"; 

$sql_statement = "SELECT * FROM Student"; 


$sql_statement2 = "SELECT * FROM Courses"; 


$result = mysqli_query($db, $sql_statement); 
echo "<div class=\"row\">";
echo "<div class=\"column\">";
echo "<table>";
echo "<tr>";
echo "<th>Student id</td>";
echo "<th>Student name</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) {
    $stu_id = $row['stu_id']; 
    $stu_name = $row['stu_name']; 
    $stu_gen = $row['stu_gen']; 
    $stu_ent_year = $row['stu_ent_year']; 
//    echo $stu_id . " " . $stu_name . " " . $stu_gen . " " . $stu_ent_year . "<br>";
    echo "<tr>";
    echo "<td>" .$stu_id;
    echo "<td>" .$stu_name;
    echo "</tr>";

} 


$result = mysqli_query($db, $sql_statement2); 
echo "</table>";
   echo "</div>";
   echo "<div class=\"column\">";
   echo "<table>";
   echo "<tr>";
   echo "<th>Course id</td>";
   echo "<th>Course name</td>";
   echo "</tr>";
while($row = mysqli_fetch_assoc($result)) {
    $course_id= $row['course_id']; 
    $course_name= $row['course_name']; 
   
//    echo $course_id . " " . $course_name . "<br>";
        echo "<tr>";
        echo "<td>" .$course_id;
        echo "<td>" .$course_name;
        echo "</tr>";
} 
echo "</table>";
echo "</div>";
echo "</div>";
?>



<br><br>
<h4>Enter a course ID and Student ID for enrollment:</h4>
<form action="insertion_enrollment.php" method="POST">
    Course ID:
    <input type="number" id="course_id" name="course_id">
    Student ID:
    <input type="number" id="stu_id" name = "stu_id">
    <input type="submit" value="Submit">
    </form>

