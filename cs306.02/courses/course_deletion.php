<?php 

include "../config.php";

?>

<form action="delete_course.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT * FROM Courses";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $course_id = $id_rows['course_id'];
    $course_name = $id_rows['course_name'];

    echo "<option value=$course_id>" . $course_id . " " . $course_name . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>