<?php 

include "../config.php";

?>

<form action="delete_instructor.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT * FROM Instructor";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $inst_id = $id_rows['inst_id'];
    $inst_name = $id_rows['inst_name'];

    echo "<option value=$inst_id>" . $inst_id . " " . $inst_name . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>