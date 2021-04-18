<?php
include_once("../config.php");
include("user_session.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Principal Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../css/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../css/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
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
            <div class="logo col-md-offset-2">
				<a href="../index.php"><img src="../images/logo2.png" /></a>
			</div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="Principal_Dashboard_Dept.php">
                            <i class="material-icons">apps</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
					<li class="active">
                        <a href="Principal_Student_Dept.php">
                            <i class="material-icons">list</i>
                            <p>Students</p>
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
                    <li>
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
                    		<div class="col-lg-8 col-md-offset-1 ">
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/IT_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
								<h6 class="text-royalblue">Information Technology</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/Computer_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
								<h6 class="text-royalblue">Computer <br>Science</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/EC_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
								<h6 class="text-royalblue">Electronic & Communication</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/Mechanical_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
								<h6 class="text-royalblue">Mechanical</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/Electrical_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
								<h6 class="text-royalblue">Electrical</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/Civil_White.png" alt="Principal Login image">	
						</div>
						<div class="card-content"> 
								<h6 class="text-royalblue">Civil</h6>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header" data-background-color="royal" >
							<img src="../icons/Science_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
								<h6 class="text-royalblue">Science & Humanities</h6>
						</div>
					</div>
				</a>
			</div>
			
		</div><!--Main middle Containt-->
		    
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