<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM CourseSchedule";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];


if (!empty($_POST['course_id']) and !empty($_POST['classid']) and !empty($_POST['begining']) and !empty($_POST['ending']) and !empty($_POST['repeat'])){
    $course_id = $_POST['course_id'];
    $classid = $_POST['classid'];
    $begining = $_POST['begining'];
    $ending = $_POST['ending'];
    $repeat = $_POST['repeat'];

    $sql_statement = "INSERT INTO CourseSchedule(course_id, classid, begining, ending) SELECT '$course_id' , '$classid', '$begining', '$ending' WHERE NOT EXISTS (SELECT * FROM CourseSchedule WHERE ('$begining' BETWEEN begining AND ending) AND ('$ending' BETWEEN begining AND ending) AND classid = '$classid')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM CourseSchedule";
    $result3 = mysqli_query($db, $sql_statement3);
    $row2 = mysqli_fetch_assoc($result3);
    $count2 = $row2['COUNT(*)'];
    if ($result != 1){
        echo "One of the given IDs is incorrect!";
    }
    else if($count == $count2){
        echo "Time conflict!";
    }
    else{
        header("Location: schedule.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}

?>