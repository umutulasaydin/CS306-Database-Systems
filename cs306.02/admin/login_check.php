<?php 

include "../config.php";

if (!empty($_POST['username']) and !empty($_POST['pass'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql_statement = "SELECT * FROM Admin";
    $result = mysqli_query($db, $sql_statement);

    $row = mysqli_fetch_assoc($result);

    if ($row['username'] == $username and $row['pass'] == $pass){
        header("Location: admin.php");
    }

}

?>
