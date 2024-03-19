<?php

include "../config.php";

if(!empty($_POST['ids']))
{
    $obs_id = $_POST['ids'];
    $sql_statement = "DELETE FROM Observer WHERE obs_id = '$obs_id' ";
    $result = mysqli_query($db, $sql_statement);
 
    header("Location: observer.php");
}

else
{
    echo "You did not choose a option.";
}


?>