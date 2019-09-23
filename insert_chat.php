<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$con = new mysqli($host, $user, $pass, $db_name);

if(isset($_POST['submit']))
{
    if(function_exists('date_default_timezone_set')) {
        date_default_timezone_set("Asia/Kolkata");
    }
    $date1 = date("Y-m-d H:i a");

    $name = $_POST['name'];
    $msg = $_POST['enter_message'];
    $type = $_POST['type'];
    $date = $date1;


    $query = "INSERT INTO chat (name,type,msg,date) VALUES ('$name','$type','$msg','$date')";
    $run = $con->query($query);
}
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/chatbot.php';
header('Location: ' . $home_url);

?>