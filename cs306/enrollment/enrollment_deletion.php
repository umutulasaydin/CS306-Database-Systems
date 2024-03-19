
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
<br><br>
<?php

include "../config.php";

$sql_statement = "SELECT * FROM Enrollment";

$result = mysqli_query($db, $sql_statement);

echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Course id</td>";
echo "<th>Course name</td>";
echo "<th>Student id</td>";
echo "<th>Student name</td>";
echo "</tr>";


while($row = mysqli_fetch_assoc($result)) {
    $course_id= $row['course_id'];
    $sql_statement2 = "SELECT * FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    echo "<tr>";
    while($row2 = mysqli_fetch_assoc($result2)){
   
        $course_name = $row2['course_name'];

//        echo $course_id . " " . $course_name . " --> " ;
        echo "<td>" .$course_id;
               echo "<td>" .$course_name;
                      
                

    }

    $stu_id = $row['stu_id'];
    $sql_statement2 = "SELECT * FROM Student WHERE stu_id = '$stu_id' ";
    $result2 = mysqli_query($db, $sql_statement2);

    while($row2 = mysqli_fetch_assoc($result2)){
        $stu_name = $row2['stu_name'];

//        echo $stu_id . " " . $stu_name . "<br>" ;
        echo "<td>" .$stu_id;
        echo "<td>" .$stu_name;
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






<form action="delete_enrollment.php" method="POST">
<select name = "ids2">

<?php
$course_id = $_POST['ids'];
$sql_command = "SELECT * FROM Student WHERE stu_id IN (SELECT stu_id FROM Enrollment WHERE course_id = '$course_id') ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $stu_id = $id_rows['stu_id'];
    $stu_name = $id_rows['stu_name'];
    $id = strval($stu_id);
    $id .= strval("-");
    $id .= strval($course_id);
    echo "<option value=$id >" . $stu_id . " " . $stu_name . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>





<br><br><br>






<form  method="POST">
<select name="ids3">


<?php
$sql_command = "SELECT * FROM Student";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $stu_id = $id_rows['stu_id'];
    $stu_name = $id_rows['stu_name'];

    echo "<option value=$stu_id>" . $stu_id . " " . $stu_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>

<br>

</form>





<form action="delete_enrollment.php" method="POST">
<select name = "ids4">

<?php
$stu_id = $_POST["ids3"];
$sql_command = "SELECT * FROM Courses WHERE course_id IN (SELECT course_id FROM Enrollment WHERE stu_id = '$stu_id' ) ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $course_id = $id_rows['course_id'];
    $course_name = $id_rows['course_name'];
    echo "<option value=$course_id >" . $course_id . " " . $course_name . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>

