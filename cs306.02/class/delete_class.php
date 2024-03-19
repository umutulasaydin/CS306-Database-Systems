<?php

include "../config.php";

if(!empty($_POST['ids']))
{
    $classid = $_POST['ids'];
    $sql_statement = "DELETE FROM Class WHERE classid = '$classid' ";
    $result = mysqli_query($db, $sql_statement);
 
    header("Location: class.php");
}

else
{
    echo "You did not choose a option.";
}


?>