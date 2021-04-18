<?php 

//include config.php to connect to the database
	include("../config.php"); 
	
	//start session
    session_start();
{
		// Define $myusername and $mypassword
	$user=$_POST['user'];
	$password=$_POST['password'];
	// To protect MySQL injection
	$user= mysqli_real_escape_string( $mysqli,$user);
	$password = mysqli_real_escape_string( $mysqli, $password);
	$password=md5($password);
	
		$fetch=mysqli_query( $mysqli, "select principal_name from principal where principal_name='$user' and password= '$password'");
		if(mysqli_num_rows($fetch)>0)
		{
		$_SESSION['login_username']=$user;
		header("location: Principal_Dashboard_Dept.php");
		}
		else
		{
		header('Location: Principal_Login.php?login=error');
		}
}
?>
