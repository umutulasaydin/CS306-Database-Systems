<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM EXAM";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];

if (!empty($_POST['exam_start']) and !empty($_POST['exam_finish']) and !empty($_POST['ids4'])){
    $id = explode("/", $_POST['ids4']);
    $course_id = $id[0];
    $inst_id = $id[1];
    $classid = $id[2];
    $obs_id = $id[3];
    $exam_start = $_POST['exam_start'];
    $exam_finish = $_POST['exam_finish'];

    $sql_statement = "INSERT INTO EXAM (classid, obs_id, inst_id, course_id, exam_start, exam_finish) SELECT '$classid', '$obs_id', '$inst_id', '$course_id', '$exam_start', '$exam_finish' WHERE NOT EXISTS ( SELECT * FROM CourseSchedule WHERE ('$exam_start' BETWEEN begining AND ending) AND ('$exam_finish' BETWEEN begining AND ending) AND classid = '$classid' AND course_id != '$course_id' ) AND NOT EXISTS ( SELECT * FROM EXAM WHERE ('$exam_start' BETWEEN exam_start AND exam_finish) AND ('$exam_finish' BETWEEN exam_start AND exam_finish) AND classid = '$classid') ";

    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM EXAM";
    $result3 = mysqli_query($db, $sql_statement3);
    $row2 = mysqli_fetch_assoc($result3);
    $count2 = $row2['COUNT(*)'];

    if($count == $count2){
        echo "Time conflict!";
    }
    else{
        header("Location: exam.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}



?>