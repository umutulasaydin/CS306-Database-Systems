
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


if (!empty($_POST['obs_name'])){
    $obs_name = $_POST['obs_name'];

    $sql_statement = "SELECT * FROM Observer WHERE obs_name LIKE '$obs_name%' ";

    $result = mysqli_query($db, $sql_statement);
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Observer id</td>";
    echo "<th>Observer name</td>";
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) { 
        $obs_id = $row['obs_id'];
        $obs_name = $row['obs_name'];
        echo "
        <tr>
            <td>".$obs_id."</td>
            <td>".$obs_name."</td>

        </tr>";
    }
    echo "</table>";
}

else{
    echo "Fill all boundaries!";
}
?>