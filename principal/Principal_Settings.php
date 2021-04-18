<?php
include_once("../config.php");
include("user_session.php");
if(isset($_POST['submit'])){
			if($_POST['newpasswd1']==$_POST['newpasswd2']){
				$check=$_SESSION['login_username'];
				$session=mysqli_query($mysqli, "SELECT `password` FROM `principal` WHERE principal_name='$check' ");
				$row=mysqli_fetch_array($session);
				$passwd=$row['password'];
				$oldpasswd=md5($_POST['oldpasswd']);
				$newpasswd=md5($_POST['newpasswd1']);
				if($oldpasswd==$passwd){
					$sql="UPDATE `principal` SET `password`='$newpasswd' WHERE principal_name='$check'";
					if (mysqli_query($mysqli,$sql)){
						header("Location: Principal_Settings.php?passwd=true");//TO notify which faculty ID Deleted	
					}		
				}
				else{
					header("Location: Principal_Settings.php?passwd=false");//TO notify which faculty ID Deleted	
				}

			}
			else{
				 header("Location: Principal_Settings.php?match=false");//TO notify which faculty ID Deleted	
			}
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Principal Settings</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../css/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../css/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../css/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
	<link href="../css/assets/css/material-icons.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="royal" >
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
				<a class="col-md-offset-2"href="../index.php"><img src="../images/logo2.png" /></a>
			</div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="Principal_Dashboard_Dept.php">
                            <i class="material-icons">apps</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="Principal_Questions.php">
                            <i class="material-icons">question_answer</i>
                            <p>Questions</p>
                        </a>
                    </li>
                    <li>
                        <a href="Principal_Profile.php">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li  class="active">
                        <a href="Principal_Settings.php">
                            <i class="material-icons">settings</i>
                            <p>Settings</p>
                        </a>
                    </li>
					<li>
                        <a href="../index.php">
                            <i class="material-icons">power_settings_new</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">

            <nav class="navbar navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header navbar-brand">
                        <h5>Faculty Evaluation & Support System
						<button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#navigation-index">
							<span class="sr-only">Toggle navigation</span>
							<i class="material-icons">menu</i>
						</button></h5>
                    </div>
                </div>
            </nav><!--Collapsible Navbar-->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                                                <div class="col-lg-6 ">
						<?php
						if(isset($_GET['match']))
						{
							if($_GET['match']=='false')
							{	
								$ins_msg =' <div class="alert alert-warning">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="material-icons">clear</i></span>
													</button>
													<span>
														<b> Password Does not match - </b> Both new passwords do not match <sub></sub></span>
												</div>';
										echo $ins_msg;									
							}
						}	
						?>
                        <?php
						if(isset($_GET['passwd']))
						{
							if($_GET['passwd']=='false')
							{	
								$ins_msg =' <div class="alert alert-warning">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="material-icons">clear</i></span>
													</button>
													<span>
														<b> Wrong Password - </b> Old password was wrong <sub></sub></span>
												</div>';
										echo $ins_msg;									
							}
						}	
						?>
                        <?php
						if(isset($_GET['passwd']))
						{
							if($_GET['passwd']=='true')
							{	
								$ins_msg =' <div class="alert alert-success">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="material-icons">clear</i></span>
													</button>
													<span>
														<b> Password Updated - </b> password was successfully changed <sub></sub></span>
												</div>';
										echo $ins_msg;									
							}
						}	
						?>
                            <div class="card">
                                <div class="card-header" data-background-color="royal">
                                    <h4 class="title">Principal Settings</h4>
                                    <p class="category">Change Password </p>
                                </div>
                                <div class="card-content">
								<div class="row">
								<div class="col-md-10 ">
								<form action="<?php $_PHP_SELF?>" method="POST">	
									<table class="table table-hover">
                                        <tbody>
											<tr>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">lock</i>
														</span>
														<div class="form-group is-empty"><input name="oldpasswd"class="form-control" placeholder="Type Old Password..." type="password" required><span class="material-input"></span></div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">lock_outline</i>
														</span>
														<div class="form-group is-empty"><input name="newpasswd1"class="form-control" placeholder="Type New Password..." type="password" required><span class="material-input"></span></div>
													</div>
												</td>
											
											</tr>
											<tr>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">lock_outline</i>
														</span>
														<div class="form-group is-empty"><input name="newpasswd2"class="form-control" placeholder="Re-Type New Password..." type="password" required><span class="material-input"></span></div>
													</div>
												</td>
											</tr>
                                        </tbody>
                                    </table>
									</div>
									<div class="col-md-6 col-md-offset-5 ">
                                    <button name="submit"type="submit" class="btn btn-info pull-right">Update</button>
								    </div>
								</form>
								</div>								
                            </div>
                        </div>
                </div>
                    </div><!---Row Ends-->
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
					<div class="col-md-offset-4">
						<sub><ol><h4>Developed & Maintained By</h4></ol>
						<ol>Information Technology Department</ol>
						</sub>
					</div>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../css/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../css/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../css/assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../css/assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../css/assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../css/assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../css/assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../css/assets/js/material-dashboard.js?v=1.2.0"></script>

</html>