<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$con = new mysqli($host, $user, $pass, $db_name);

$sql = "SELECT CONCAT (admission_form2.firstname,' ', admission_form2.lastname) as name,chat.msg,chat.date   FROM chat left join admission_form2 on chat.name = admission_form2.enrollment_no where chat.type != \"admin\" order  by id desc ";


$result = $con->query($sql);
$result1 ="";
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) {

    $result1 .='<div id="chat_data">';
    $result1 .='<span style="color:green;"> '.$row['name'] .':</span>';
    $result1 .='<span style="color:brown;">'. $row['msg'].'</span>';
    $result1 .='<span style="float:right;">'. $row['date'].'</span>';
    $result1 .='</div>';
     }
}

echo $result1;

?>