<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$con = new mysqli($host, $user, $pass, $db_name);


if($_POST['type'] == "decline")
{
    $sql = "Delete from chat where id = ".$_POST['id'];
    $result = $con->query($sql);
}
if($_POST['type'] == "approve")
{
    $sql = "update chat set approve=\"approved\" where id =  ".$_POST['id'];
    $result = $con->query($sql);
}
echo $_POST['type'];
?>