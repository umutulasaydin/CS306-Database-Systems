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

$sql_statement = "SELECT course_id FROM CourseSchedule GROUP BY course_id" ; 

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

    $sql_statement2 = "SELECT * FROM CourseSchedule WHERE course_id = '$course_id' ORDER BY begining ASC";
    $sql_statement3 = "SELECT course_name FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $result3 = mysqli_query($db, $sql_statement3);
    $course_name = mysqli_fetch_assoc($result3)['course_name'];
    while($row2 = mysqli_fetch_assoc($result2)){
        $classid = $row2['classid'];
        $begining = $row2['begining'];
        $ending = $row2['ending'];

//        echo $course_name . " / " . $classid . " / " . $begining . " / " . $ending . "<br>";
        echo "<td>" .$course_name;
        echo "<td>" .$classid;
        echo "<td>" .$begining;
        echo "<td>" .$ending;
        echo "</tr>";
    }
}
echo "</table>";

?>

<br><br><br><br>
Filter:
<br>

<form action="selection_schedule.php" method="POST">
Course Name:
    <input type="text" id="course_name" name="course_name">
Class ID:
    <input type="text" id="classid" name="classid">
    <input type ="submit" value="Filter">
</form>

<form action="http://localhost/cs306/schedule/schedule_insertion.php">
    <input type="submit" value="ENROLL LESSON" />
</form>

<form action="http://localhost/cs306/schedule/schedule_deletion.php">
    <input type="submit" value="DROP LESSON" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
