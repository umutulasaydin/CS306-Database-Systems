<?php

include "../config.php";




if (!empty($_POST['ids2'])){
    $id = explode("/",$_POST['ids2']);
    $classid = $id[0];
    $exam_start = $id[1];
    $exam_start .= " ";
    $exam_start .= $id[2];
    
    $sql_statement = "DELETE FROM EXAM WHERE classid = '$classid' AND exam_start = '$exam_start' ";
    $result = mysqli_query($db, $sql_statement);
    
    if ($result != 1){
        echo "One of the given IDs is incorrect!";
    }
    else{
        header("Location: exam.php");
    }


}

else if (!empty($_POST['ids4'])){
    $id = explode("/",$_POST['ids4']);
    $classid = $id[0];
    $exam_start = $id[1];
    $exam_start .= " ";
    $exam_start .= $id[2];
    
    $sql_statement = "DELETE FROM EXAM WHERE classid = '$classid' AND exam_start = '$begining' ";
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