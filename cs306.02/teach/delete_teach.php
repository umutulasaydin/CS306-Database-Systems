<?php

include "../config.php";




if (!empty($_POST['ids2'])){
    $id = explode("-",$_POST['ids2']);
    $inst_id = $id[0];
    $course_id = $id[1];
    
    $sql_statement = "DELETE FROM Teach WHERE inst_id = '$inst_id' AND course_id = '$course_id' ";
    $result = mysqli_query($db, $sql_statement);
    
    if ($result != 1){
        echo "One of the given IDs is incorrect!";
    }
    else{
        header("Location: teach.php");
    }


}

else if (!empty($_POST['ids4'])){
    $id = explode("-",$_POST['ids4']);
    $inst_id = $id[0];
    $course_id = $id[1];
    
    $sql_statement = "DELETE FROM Teach WHERE inst_id = '$inst_id' AND course_id = '$course_id' ";
    $result = mysqli_query($db, $sql_statement);
    
    if ($result != 1){
        echo "One of the given IDs is incorrect!";
    }
    else{
        header("Location: teach.php");
    }


}

else{
    echo "HATA";
}

?>