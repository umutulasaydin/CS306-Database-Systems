<?php

include "../config.php";

if(!empty($_POST['ids']))
{
    $stu_id = $_POST['ids'];
    $sql_statement = "DELETE FROM Student WHERE stu_id = $stu_id";
    $result = mysqli_query($db, $sql_statement);
    header("Location: student.php");
}

else
{
    echo "You did not choose a option.";
}


?>
