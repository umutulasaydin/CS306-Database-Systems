

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

$sql_statement = "SELECT * FROM Teach"; 

$result = mysqli_query($db, $sql_statement); 

echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Course id</td>";
echo "<th>Course name</td>";
echo "<th>Instructor id</td>";
echo "<th>Instructor name</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) { 
    $course_id= $row['course_id'];

    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $course_name = $row2['course_name'];

//        echo $course_id . " " . $course_name . " --> " ;
        echo "<td>" .$course_id;
        echo "<td>" .$course_name;
    }

    $inst_id = $row['inst_id']; 
    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $inst_name = $row2['inst_name'];

//        echo $inst_id . " " . $inst_name . "<br>" ;
        echo "<td>" .$inst_id;
        echo "<td>" .$inst_name;
    }
    echo "</tr>";
} 
echo "</table>";
?>

<br><br><br><br>
Filter:
<br>


<form action="selection_teach.php" method="POST">
Course ID:
    <input type="text" id="course_id" name="course_id">
Instructor ID:
    <input type="text" id="inst_id" name="inst_id">
    <input type ="submit" value="Filter">
</form>

<br><br>
<form action="http://localhost/cs306/teach/teach_insertion.php">
    <input type="submit" value="ENROLL INSTRUCTOR" />
</form>

<form action="http://localhost/cs306/teach/teach_deletion.php">
    <input type="submit" value="DROP INSTRUCTOR" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
