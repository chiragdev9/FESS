<?php
include('../config.php');
session_start();
$check=$_SESSION['login_username'];
$session=mysqli_query($mysqli, "SELECT `enrollment` FROM `student` WHERE enrollment='$check' ");
$row=mysqli_fetch_array($session);
$login_session=$row['enrollment'];
if(!isset($login_session))
{
echo "You Failed !!";
sleep(5);
 header('Location:../index.php');
}
?>