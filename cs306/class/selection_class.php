
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


if (!empty($_POST['lower_bound']) and !empty($_POST["upper_bound"])){
    $lower = $_POST['lower_bound'];
    $upper = $_POST["upper_bound"];

    $sql_statement = "SELECT * FROM Class WHERE Capacity >= '$lower' AND Capacity <= '$upper' ";

    $result = mysqli_query($db, $sql_statement);
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Class id</td>";
    echo "<th>Capacity</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) { 
        $classid = $row['classid'];
        $capacity = $row['Capacity'];
//        echo $classid . " " . $capacity . "<br>";
        echo "
            <tr>
                <td>".$classid."</td>
                <td>".$capacity."</td>

            </tr>";
    }
    echo "</table>";
}

else{
    echo "Fill all boundaries!";
}

?>
<br><br>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
