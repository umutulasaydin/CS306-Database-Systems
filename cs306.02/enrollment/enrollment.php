
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

$sql_statement = "SELECT * FROM Enrollment"; 

$result = mysqli_query($db, $sql_statement);

echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Course id</td>";
echo "<th>Course name</td>";
echo "<th>Student id</td>";
echo "<th>Student name</td>";
echo "</tr>";


while($row = mysqli_fetch_assoc($result)) { 
    $course_id= $row['course_id'];
    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    echo "<tr>";
    while($row2 = mysqli_fetch_assoc($result2)){
   
        $course_name = $row2['course_name'];

//        echo $course_id . " " . $course_name . " --> " ;
        echo "<td>" .$course_id;
        echo "<td>" .$course_name;
                      
                

    }

    $stu_id = $row['stu_id']; 
    $sql_statement2 = "SELECT * FROM Student WHERE stu_id = '$stu_id' ";
    $result2 = mysqli_query($db, $sql_statement2);

    while($row2 = mysqli_fetch_assoc($result2)){
        $stu_name = $row2['stu_name'];

//        echo $stu_id . " " . $stu_name . "<br>" ;
        echo "<td>" .$stu_id;
        echo "<td>" .$stu_name;
    }
    echo "</tr>";
  
} 
echo "</table>";
?>

<br><br><br><br>
Filter:
<br>


<form action="selection_enrollment.php" method="POST">
Course ID:
    <input type="number" id="course_id" name="course_id">
Student ID:
    <input type="number" id="stu_id" name="stu_id">
    <input type ="submit" value="Filter">
</form>

<br><br>
<form action="http://localhost/cs306/enrollment/enrollment_insertion.php">
    <input type="submit" value="ENROLL LESSON" />
</form>

<form action="http://localhost/cs306/enrollment/enrollment_deletion.php">
    <input type="submit" value="DROP LESSON" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
