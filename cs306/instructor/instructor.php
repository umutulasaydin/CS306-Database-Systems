
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

$sql_statement = "SELECT * FROM Instructor"; 

$result = mysqli_query($db, $sql_statement); 
echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Instructor id</td>";
echo "<th>Instructor name</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) { 
    $inst_id= $row['inst_id']; 
    $inst_name= $row['inst_name']; 
   
//    echo $inst_id . " " . $inst_name . "<br>";
    echo "
        <tr>
            <td>".$inst_id."</td>
            <td>".$inst_name."</td>

        </tr>";
} 
echo "</table>";
?>

<br><br>
<h4>Filter for Instructor Selection:</h4>


<form action="selection_instructor.php" method="POST">
Instructor Name:
    <input type="text" id="inst_name" name="inst_name">
    <input type ="submit" value="Filter">
</form>

<br><br>

<form action="http://localhost/cs306/instructor/instructor_insertion.html">
    <input type="submit" value="ADD INSTRUCTOR" />
</form>

<form action="http://localhost/cs306/instructor/instructor_deletion.php">
    <input type="submit" value="DELETE INSTRUCTOR" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
