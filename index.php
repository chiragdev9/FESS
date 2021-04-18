<?php
session_start();
if(isset($_SESSION['login_username']))
{
	session_destroy();
}
?><html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Faculty Evaluation & Support System</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="css/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="css/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="wrapper">
		<div class="col-md-10 col-md-offset-1">	
			<div class="card">	
				<header>
					<div class="col-md-10 col-md-offset-2">
						<div class="col-md-2">
							<a href="#"><img src="images/logo1.png" width="135px" height="140px"></a>
						</div>
						<div class="col-md-10">
							<b><h2 class="text-royalblue">Sigma Institute of Engineering</h2></b>
						</div>
						<div class="col-md-8">
							<b><h3 class="text-royalblue">Faculty Evaluation & Support System</h3></b>
						</div>
					</div>		
				</header>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-2">
			<div class="col-md-3">
				<a href="students/Student_Login.php">
					<div class="card">
						<div class="card-header card-chart" data-background-color="royal" >
							<img src="images/student-male_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
							<hr>
							<div class="col-md-offset-4">
								<h4 class="title text-royalblue"><b>STUDENTS</b></h4>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="hod/HOD_Login.php">
					<div class="card">
						<div class="card-header card-chart" data-background-color="royal" >
							<img src="images/HOD_White.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
							<hr>
							<div class="col-md-offset-4">
								<h4 class="title text-royalblue"><b>H.O.D</b></h4>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="principal/Principal_Login.php">
					<div class="card">
						<div class="card-header card-chart" data-background-color="royal" >
							<img src="images/oldman_white.png" alt="Principal Login image">	
						</div>
						<div class="card-content">
							<hr>
							<div class="col-md-offset-4">
								<h4 class="title text-royalblue"><b>PRINCIPAL</b></h4>
							</div>
						</div>
					</div>
				</a>
			</div>
			
		</div><!--Main middle Containt-->
		<div class="col-md-10 col-md-offset-1">
		<div class="card">
			<footer class="footer">
					<div class="col-md-10 col-md-offset-1">
						<h5>
						Developers
						</h5>
						<div class="col-md-3">
							<ol>Chirag Thakur</ol>
							<ol>chiragthakur@hotmail.com</ol>
						</div>
						<div class="col-md-3">		
							<ol>Yash Pathak</ol>
							<ol>yashpathak34@gmail.com</ol>
						</div>
						<div class="col-md-3">
							<ol>Priyanka Ghadshi</ol>
							<ol>priyankaghadshi92@gmail.com</ol>
						</div>
					</div>	
			</footer><!--Footer-->
		</div>
		</div>
	</div><!--main container-->
</body>


<!--   Core JS Files   -->
<script src="css/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="css/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="css/assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="css/assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="css/assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="css/assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="css/assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="css/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="css/assets/js/demo.js"></script>

</html>