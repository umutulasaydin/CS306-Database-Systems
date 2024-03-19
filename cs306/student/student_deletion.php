<?php 

include "../config.php";

?>

<form action="delete_student.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT * FROM Student";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
    $stu_id = $id_rows['stu_id'];
    $stu_name = $id_rows['stu_name'];
    $stu_gen = $id_rows['stu_gen'];
    $stu_ent_year = $id_rows['stu_ent_year'];
    echo "<option value=$stu_id>". $stu_id . " - " . $stu_name . " - " . $stu_gen . " - " . $stu_ent_year . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>