
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

$sql_statement = "SELECT course_id FROM CourseSchedule GROUP BY course_id" ;

$result = mysqli_query($db, $sql_statement);
echo "<table style=\width:200%\>";
echo "<tr>";
echo "<th>Course id</td>";
echo "<th>Course name</td>";
echo "<th>Student id</td>";
echo "<th>Student name</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)) {
    $course_id = $row['course_id'];

    $sql_statement2 = "SELECT * FROM CourseSchedule WHERE course_id = '$course_id' ORDER BY begining ASC";
    $sql_statement3 = "SELECT course_name FROM Courses WHERE course_id = '$course_id' ";
    $result2 = mysqli_query($db, $sql_statement2);
    $result3 = mysqli_query($db, $sql_statement3);
    $course_name = mysqli_fetch_assoc($result3)['course_name'];
    while($row2 = mysqli_fetch_assoc($result2)){
        $classid = $row2['classid'];
        $begining = $row2['begining'];
        $ending = $row2['ending'];

//        echo $course_name . " / " . $classid . " / " . $begining . " / " . $ending . "<br>";
        echo "<td>" .$course_name;
        echo "<td>" .$classid;
        echo "<td>" .$begining;
        echo "<td>" .$ending;
        echo "</tr>";
    }
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






<form action="delete_schedule.php" method="POST">
<select name = "ids2">

<?php
$course_id = $_POST['ids'];
$sql_command = "SELECT classid, begining, ending FROM CourseSchedule WHERE course_id = '$course_id' ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $classid = $id_rows['classid'];
    $begining = $id_rows['begining'];
    $ending = $id_rows['ending'];
    $id2 = explode(" ",$begining);
    $id = strval($classid);
    $id .= strval("/");
    $id .= strval($id2[0]);
    $id .= strval("/");
    $id .= strval($id2[1]);
    
    echo "<option value=$id >" . $classid . " / " . $begining . " / " . $ending . " / " . "</option>";
}


?>

</select>
<button>DELETE</button>
</form>





<br><br><br>






<form  method="POST">
<select name="ids3">


<?php
$sql_command = "SELECT * FROM Class";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $classid = $id_rows['classid'];
    $class_name = $id_rows['class_name'];

    echo "<option value=$classid>" . $classid . " " . $class_name . "</option>";
}

?>

</select>
<button>CHOOSE</button>

<br>

</form>





<form action="delete_schedule.php" method="POST">
<select name = "ids4">

<?php
$classid = $_POST["ids3"];
$sql_command = "SELECT course_id, begining, ending FROM CourseSchedule WHERE classid = '$classid' ";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
    $course_id = $id_rows['course_id'];
    $begining = $id_rows['begining'];
    $ending = $id_rows['ending'];
    $id2 = explode(" ",$begining);
    $id = strval($classid);
    $id .= strval("/");
    $id .= strval($id2[0]);
    $id .= strval("/");
    $id .= strval($id2[1]);
    echo "<option value=$id >" . $course_id . " / " . $begining . " / " . $ending . " / " . "</option>";}

?>

</select>
<button>DELETE</button>
</form>
