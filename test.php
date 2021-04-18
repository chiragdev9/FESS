<?php

//db settings
$db_username = 'id16631263_fessdb';
$db_password = '';
$db_name = 'id16631263_fess';
$db_host = 'localhost';
$mysqli = mysqli_connect($db_host, $db_username, $db_password,$db_name)
//$enrollment = '140500109524';
//$password = '140500109524';
//$password = md5($password);
//$fetch=mysqli_query( $mysqli, "select enrollment from student where enrollment='$enrollment'");
if(!mysqli){echo "NOt connected";}
else{echo "Successfully connected..!";}
?>