<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM Student";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];

if (!empty($_POST['sid']) and !empty($_POST['sname']) and !empty($_POST['ent_year'])){ 
    $sid = $_POST['sid']; 
    $sname = $_POST['sname']; 
    $stu_gen = $_POST['stu_gen']; 
    $ent_year = $_POST['ent_year']; 
    $sql_statement = "INSERT INTO Student(stu_id, stu_name, stu_gen, stu_ent_year) VALUES ('$sid','$sname','$stu_gen','$ent_year')"; 
    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM Student";
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
        header("Location: student.php");
    }
} 
else 
{
    echo "You should fiil all the inputs!";
}

?>