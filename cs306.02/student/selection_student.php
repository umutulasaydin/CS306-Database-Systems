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

if (!empty($_POST['stu_ent_year']) and !empty($_POST['stu_gen']) and !empty($_POST['stu_name']))
{
    $stu_ent_year = $_POST['stu_ent_year'];
    $stu_gen = $_POST['stu_gen'];
    $stu_name = $_POST['stu_name'];

    $sql_statement = "SELECT * FROM Student WHERE stu_ent_year = '$stu_ent_year' AND stu_gen = '$stu_gen' AND  stu_name LIKE '$stu_name%' ";

}

else if (!empty($_POST['stu_ent_year']) and !empty($_POST['stu_gen']))
{
    $stu_ent_year = $_POST['stu_ent_year'];
    $stu_gen = $_POST['stu_gen'];

    $sql_statement = "SELECT * FROM Student WHERE stu_ent_year = '$stu_ent_year' AND stu_gen = '$stu_gen' ";
}

else if (!empty($_POST['stu_ent_year']) and !empty($_POST['stu_name']))
{
    $stu_ent_year = $_POST['stu_ent_year'];
    $stu_name = $_POST['stu_name'];

    $sql_statement = "SELECT * FROM Student WHERE stu_ent_year = '$stu_ent_year' AND stu_name LIKE '$stu_name%' ";
}

else if (!empty($_POST['stu_gen']) and !empty($_POST['stu_name']))
{
    $stu_gen = $_POST['stu_gen'];
    $stu_name = $_POST['stu_name'];

    $sql_statement = "SELECT * FROM Student WHERE stu_gen = '$stu_gen' AND  stu_name LIKE '$stu_name%' ";
}

else if (!empty($_POST['stu_ent_year']))
{
    $stu_ent_year = $_POST['stu_ent_year'];

    $sql_statement = "SELECT * FROM Student WHERE stu_ent_year = '$stu_ent_year' ";
}

else if (!empty($_POST['stu_gen']))
{
    $stu_gen = $_POST['stu_gen'];

    $sql_statement = "SELECT * FROM Student WHERE stu_gen = '$stu_gen' ";
}

else if (!empty($_POST['stu_name']))
{
    $stu_name = $_POST['stu_name'];

    $sql_statement = "SELECT * FROM Student WHERE stu_name LIKE '$stu_name%' ";
}

else 
{
    echo "You did not choose anything.";
}


if (!empty($sql_statement)){

    $result = mysqli_query($db, $sql_statement);
    echo "<table style=\width:200%\>";
    echo "<tr>";
    echo "<th>Student id</td>";
    echo "<th>Name</td>";
    echo "<th>Gender</td>";
    echo "<th>Entry Year</td>";
    echo "</tr>";

    while($row = mysqli_fetch_assoc($result)) 
    { 
        $stu_id = $row['stu_id']; 
        $stu_name = $row['stu_name']; 
        $stu_gen = $row['stu_gen']; 
        $stu_ent_year = $row['stu_ent_year']; 
        echo "
            <tr>
                <td>".$stu_id."</td>
                <td>".$stu_name."</td>
                <td>".$stu_gen."</td>
                <td>".$stu_ent_year."</td>
            </tr>";
    }
    echo "</table>";
}

else{
    echo "Failure";
}

?>
<br><br>
<form action="http://localhost/cs306/admin/admin.php">
    <input type="submit" value="Return to admin page" />
</form>
