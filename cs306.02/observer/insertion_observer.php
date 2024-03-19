<?php 

include "../config.php";

$sql_statement2 = "SELECT COUNT(*) FROM Observer";
$result2 = mysqli_query($db, $sql_statement2);
$row = mysqli_fetch_assoc($result2);
$count = $row['COUNT(*)'];

if (!empty($_POST['obs_id']) and !empty($_POST['obs_name'])){
    $obs_id = $_POST['obs_id'];
    $obs_name = $_POST['obs_name'];

    $sql_statement = "INSERT INTO Observer(obs_id, obs_name) VALUES ('$obs_id' , '$obs_name')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement3 = "SELECT COUNT(*) FROM Observer";
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
        header("Location: observer.php");
    }
}

else{
    echo "You should fiil all the inputs!";
}

?>