<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM Enrollment";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];

if (!empty($_POST['stu_id']) and !empty($_POST['course_id'])){
    $course_id = $_POST['course_id'];
    $stu_id = $_POST['stu_id'];

    $sql_statement = "INSERT INTO Enrollment(course_id, stu_id) VALUES ('$course_id' , '$stu_id')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM Enrollment";
    $result3 = mysqli_query($db, $sql_statement3);
    $row2 = mysqli_fetch_assoc($result3);
    $count2 = $row2['COUNT(*)'];
    if ($result != 1){
        echo "There is a error!";
    }
    else if($count == $count2){
        echo "The given id is already registered!";
    }
    else{
        header("Location: enrollment.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}

?>