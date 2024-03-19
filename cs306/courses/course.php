
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

$sql_statement = "SELECT * FROM Courses"; 

$result = mysqli_query($db, $sql_statement); 
echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Course id</td>";
echo "<th>Course name</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) { 
    $course_id= $row['course_id']; 
    $course_name= $row['course_name']; 
   
//    echo $course_id . " " . $course_name . "<br>";
    echo "
        <tr>
            <td>".$course_id."</td>
            <td>".$course_name."</td>

        </tr>";

} 
echo "</table>";
?>

<br><br>
<h4>Filter for course selection:</h4>



<form action="selection_course.php" method="POST">
Course Name:
    <input type="text" id="course_name" name="course_name">
    <input type ="submit" value="Filter">
</form>

<br><br>
<form action="http://localhost/cs306/courses/course_insertion.html">
    <input type="submit" value="ADD COURSE" />
</form>

<form action="http://localhost/cs306/courses/course_deletion.php">
    <input type="submit" value="DELETE COURSE" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>


