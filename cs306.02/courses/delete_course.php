<?php

include "../config.php";

if(!empty($_POST['ids']))
{
    $course_id = $_POST['ids'];
    $sql_statement = "DELETE FROM Courses WHERE course_id = '$course_id' ";
    $result = mysqli_query($db, $sql_statement);
 
    header("Location: course.php");
}

else
{
    echo "You did not choose a option.";
}


?>