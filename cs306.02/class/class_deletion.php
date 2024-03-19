<?php 

include "../config.php";

?>

<form action="delete_class.php" method="POST">
<select name="ids">

<?php


$sql_command = "SELECT * FROM Class";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $classid = $id_rows['classid'];
    $Capacity = $id_rows['Capacity'];

    echo "<option value=$classid>" . $classid . " " . $Capacity . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>


