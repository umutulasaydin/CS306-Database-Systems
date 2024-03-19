<?php 

include "../config.php";

?>

<form action="delete_observer.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT * FROM Observer";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $obs_id = $id_rows['obs_id'];
    $obs_name = $id_rows['obs_name'];

    echo "<option value=$obs_id>" . $obs_id . " " . $obs_name . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>