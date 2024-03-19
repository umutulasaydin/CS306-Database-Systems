<?php

include "../config.php";

if(!empty($_POST['ids']))
{
    $inst_id = $_POST['ids'];
    $sql_statement = "DELETE FROM Instructor WHERE inst_id = '$inst_id' ";
    $result = mysqli_query($db, $sql_statement);
 
    header("Location: instructor.php");
}

else
{
    echo "You did not choose a option.";
}


?>