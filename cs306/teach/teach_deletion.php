


<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}


</style>
<div align="center">


<br>
<?php

include "../config.php";

$sql_statement = "SELECT * FROM Teach"; 

$result = mysqli_query($db, $sql_statement); 
echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Course id</td>";
echo "<th>Course name</td>";
echo "<th>Instructor id</td>";
echo "<th>Instructor name</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) { 
    $course_id= $row['course_id'];

    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $course_name = $row2['course_name'];

//        echo $course_id . " " . $course_name . " --> " ;
        echo "<td>" .$course_id;
        echo "<td>" .$course_name;
    }

    $inst_id = $row['inst_id']; 
    $sql_statement2 = "SELECT * FROM Instructor WHERE inst_id = '$inst_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $inst_name = $row2['inst_name'];

//        echo $inst_id . " " . $inst_name . "<br>" ;
        echo "<td>" .$inst_id;
        echo "<td>" .$inst_name;
    }
    echo "</tr>";
   
} 
echo "</table>";
?>

<br><br><br>



<form  method="POST">
<select name="ids">


<?php

$sql_command = "SELECT * FROM Courses";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $course_id = $id_rows['course_id'];
    $course_name = $id_rows['course_name'];

    echo "<option value=$course_id>" . $course_id . " " . $course_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>

<br>
</form>






<form action="delete_teach.php" method="POST">
<select name = "ids2">

<?php
$course_id = $_POST['ids'];
$sql_command = "SELECT * FROM Instructor WHERE inst_id IN (SELECT inst_id FROM Teach WHERE course_id = '$course_id') ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $inst_id = $id_rows['inst_id'];
    $inst_name = $id_rows['inst_name'];
    $id = strval($inst_id);
    $id .= strval("-");
    $id .= strval($course_id);
    echo "<option value=$id >" . $inst_id . " " . $inst_name .  "</option>";
}

?>

</select>
<button>DELETE</button>
</form>





<br><br><br>






<form  method="POST">
<select name="ids3">


<?php
$sql_command = "SELECT * FROM Instructor";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $inst_id = $id_rows['inst_id'];
    $inst_name = $id_rows['inst_name'];

    echo "<option value=$inst_id>" . $inst_id . " " . $inst_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>

<br>

</form>





<form action="delete_teach.php" method="POST">
<select name = "ids4">

<?php
$inst_id = $_POST["ids3"];
$sql_command = "SELECT * FROM Courses WHERE course_id IN (SELECT course_id FROM Teach WHERE inst_id = '$inst_id' ) ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $course_id = $id_rows['course_id'];
    $course_name = $id_rows['course_name'];
    $id = strval($inst_id);
    $id .= strval("-");
    $id .= strval($course_id);
    echo "<option value=$id >" . $course_id . " " . $course_name . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>

