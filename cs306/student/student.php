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
<div align="center">
<?php


include "../config.php"; 

$sql_statement = "SELECT * FROM Student"; 

$result = mysqli_query($db, $sql_statement); 

echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Student id</td>";
echo "<th>Name</td>";
echo "<th>Gender</td>";
echo "<th>Entry Year</td>";
echo "</tr>";


while($row = mysqli_fetch_assoc($result)) {
    $stu_id = $row['stu_id']; 
    $stu_name = $row['stu_name']; 
    $stu_gen = $row['stu_gen']; 
    $stu_ent_year = $row['stu_ent_year']; 
//    echo $stu_id . " " . $stu_name . " " . $stu_gen . " " . $stu_ent_year . "<br>";
    
    echo "
        <tr>
            <td>".$stu_id."</td>
            <td>".$stu_name."</td>
            <td>".$stu_gen."</td>
            <td>".$stu_ent_year."</td>
        </tr>";

} 

echo "</table>";
?>


<br><br>
<h4>Filter for Student Selection</h4>


<form action="selection_student.php" method="POST">
Gender:
    <select name="stu_gen">
    <option value= ""> </option>
    <option value="M">M</option>
    <option value="F">F</option>
    </select>
Entry Year:
    <input type="number" id="stu_ent_year" name="stu_ent_year">

<br><br>

Student Name:
    <input type="text" id="stu_name" name="stu_name">
    <input type ="submit" value="Filter">
</form>

<br><br><br><br>

<form action="http://localhost/cs306/student/student_insertion.html">
    <input type="submit" value="ADD STUDENT" />
</form>
<form action="http://localhost/cs306/student/student_deletion.php">
    <input type="submit" value="DELETE STUDENT" />
</form>

</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>

</html>
