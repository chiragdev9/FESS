<?php 

//include config.php to connect to the database
	include("../config.php"); 
	
	//start session
    session_start();
{
		// Define $myusername and $mypassword
	$email=$_POST['email'];
	$password=$_POST['password'];
	// To protect MySQL injection
	$email= mysqli_real_escape_string( $mysqli,$email);
	$password = mysqli_real_escape_string( $mysqli, $password);
	$password=md5($password);
		$fetch=mysqli_query( $mysqli, "select email from hod where email='$email' and password= '$password'");
		if(mysqli_num_rows($fetch)>0)
		{
		$_SESSION['login_username']=$email;
		header("location: HOD_Dashboard.php");
		}
		else
		{
		header('Location: HOD_Login.php?login=error');
		}
}
?>
