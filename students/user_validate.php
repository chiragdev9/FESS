<?php 

//include config.php to connect to the database
	include("../config.php"); 
	
	//start session
    session_start();
{
		// Define $myusername and $mypassword
	$enrollment=$_POST['enrollment'];
	$password=$_POST['password'];
	// To protect MySQL injection
	$enrollment= mysqli_real_escape_string( $mysqli,$enrollment);
	$password = mysqli_real_escape_string( $mysqli, $password);
	$password=md5($password);
		$fetch=mysqli_query( $mysqli, "select enrollment from student where enrollment='$enrollment' and password= '$password'");
		if(mysqli_num_rows($fetch)>0)
		{
		$_SESSION['login_username']=$enrollment;
		header("location: Student_Dashboard.php");
		}
		else
		{
		header('Location: Student_Login.php?login=error');
		}
}
?>
