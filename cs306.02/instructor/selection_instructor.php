
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


if (!empty($_POST['inst_name'])){
    $inst_name = $_POST['inst_name'];

    $sql_statement = "SELECT * FROM Instructor WHERE inst_name LIKE '$inst_name%' ";

    $result = mysqli_query($db, $sql_statement);
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Instructor id</td>";
    echo "<th>Instructor name</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) { 
        $inst_id = $row['inst_id'];
        $inst_name = $row['inst_name'];
       

        echo "
        <tr>
            <td>".$inst_id."</td>
            <td>".$inst_name."</td>

        </tr>";
    }
    echo "</table>";
}

else{
    echo "Fill all boundaries!";
}