<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM Class";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];


if (!empty($_POST['classid']) and !empty($_POST['Capacity'])){
    $classid = $_POST['classid'];
    $Capacity = $_POST['Capacity'];

    $sql_statement = "INSERT INTO Class(classid, Capacity) VALUES ('$classid' , '$Capacity')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM Class";
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
        header("Location: class.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}

?>