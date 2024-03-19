<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM Courses";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];

if (!empty($_POST['course_id']) and !empty($_POST['course_name'])){
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];

    $sql_statement = "INSERT INTO Courses(course_id, course_name) VALUES ('$course_id' , '$course_name')";
    $result = mysqli_query($db, $sql_statement);
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
        header("Location: course.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}

?>