
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

$sql_statement = "SELECT * FROM Class"; 

$result = mysqli_query($db, $sql_statement); 

echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Class id</td>";
echo "<th>Capacity</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) { 
    $classid= $row['classid']; 
    $Capacity= $row['Capacity']; 
   
//    echo $classid . " " . $Capacity . "<br>";
    echo "
        <tr>
            <td>".$classid."</td>
            <td>".$Capacity."</td>

        </tr>";


}
echo "</table>";

?>

<br><br>
<h4>Filter for classroom selection: </h3>

<form action="selection_class.php" method="POST">
Minimum capacity:
    <input type="number" id="lower_bound" name="lower_bound">
Maximum capacity:
    <input type="number" id="upper_bound" name="upper_bound">
    <input type ="submit" value="Filter">
</form>

<br><br>

<form action="http://localhost/cs306/class/class_insertion.html">
    <input type="submit" value="ADD CLASS" />
</form>
<form action="http://localhost/cs306/class/class_deletion.php">
    <input type="submit" value="DELETE CLASS" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
