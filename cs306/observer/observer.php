
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

$sql_statement = "SELECT * FROM Observer"; 

$result = mysqli_query($db, $sql_statement); 
echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Observer id</td>";
echo "<th>Observer name</td>";
echo "</tr>";while($row = mysqli_fetch_assoc($result)) {
    $obs_id= $row['obs_id']; 
    $obs_name = $row['obs_name']; 
   
    echo "
        <tr>
            <td>".$obs_id."</td>
            <td>".$obs_name."</td>

        </tr>";
} 
echo "</table>";
?>

<br><br>
<h4>Filter for observer selection:</h4>



<form action="selection_observer.php" method="POST">
Observer Name:
    <input type="text" id="obs_name" name="obs_name">
    <input type ="submit" value="Filter">
</form>

<br><br>

<form action="http://localhost/cs306/observer/observer_insertion.html">
    <input type="submit" value="ADD OBSERVER" />
</form>

<form action="http://localhost/cs306/observer/observer_deletion.php">
    <input type="submit" value="DELETE OBSERVER" />
</form>
</div>
<h4> Click this to get back to the admin page</h4>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
