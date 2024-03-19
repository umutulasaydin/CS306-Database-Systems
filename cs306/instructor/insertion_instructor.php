<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM Instructor";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];

if (!empty($_POST['inst_id']) and !empty($_POST['inst_name'])){
    $inst_id = $_POST['inst_id'];
    $inst_name = $_POST['inst_name'];

    $sql_statement = "INSERT INTO Instructor(inst_id, inst_name) VALUES ('$inst_id' , '$inst_name')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM Instructor";
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
        header("Location: instructor.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}

?>