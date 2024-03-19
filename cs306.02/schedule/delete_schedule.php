<?php

include "../config.php";




if (!empty($_POST['ids2'])){
    $id = explode("/",$_POST['ids2']);
    $classid = $id[0];
    $begining = $id[1];
    $begining .= " ";
    $begining .= $id[2];
    
 
    
    $sql_statement = "DELETE FROM CourseSchedule WHERE classid = '$classid' AND begining = '$begining' ";
    $result = mysqli_query($db, $sql_statement);
    
    if ($result != 1){
        echo "One of the given IDs is incorrect!";
    }
    else{
        header("Location: schedule.php");
    }


}

else if (!empty($_POST['ids4'])){
    $id = explode("/",$_POST['ids4']);
    $classid = $id[0];
    $begining = $id[1];
    $begining .= " ";
    $begining .= $id[2];
    
    $sql_statement = "DELETE FROM CourseSchedule WHERE classid = '$classid' AND begining = '$begining' ";
    $result = mysqli_query($db, $sql_statement);
    
    if ($result != 1){
        echo "One of the given IDs is incorrect!";
    }
    else{
        header("Location: schedule.php");
    }


}

else{
    echo "HATA";
}

?>