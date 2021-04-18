<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="..css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Login</title>
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
		<div class="col-md-10 col-md-offset-1">	
			<div class="card">	
				<header>
					<div class="col-md-10 col-md-offset-2">
						<div class="col-md-2">
						<a href="../index.php"><img src="../images/logo1.png" ></a>
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
		<div class="col-md-4 col-md-offset-4">
					<?php
				if(isset($_GET['login'])){
					$error =' <div class="alert alert-warning">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="material-icons">clear</i></span>
													</button>
													<span>
														<b> Warning - </b> Login Failed <sub></sub></span>
												</div>';
					echo $error;
				}
			?>

			<div class="card">
				<div class="card-header" data-background-color="royal">
					<h4 class="title">Student</h4>
					<p class="category">Login</p>
				</div>
				<div class="card-content">
					<form action="user_validate.php" method="POST">
						<div class="row">
							<div class="col-md-10 ">
							   <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">mail</i>
									</span>
								<div class="form-group is-empty"><input pattern="[1-9]{1}[0-9]{11}" name="enrollment" class="form-control" placeholder="Enrollment No..." type="text"><span class="material-input"></span></div>
					</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock</i>
									</span>
								<div class="form-group is-empty"><input pattern="[1-9]{1}[0-9]{11}" name="password"placeholder="Password..." class="form-control" type="password"><span class="material-input"></span></div>
								</div>	
							</div>
						</div>
						<hr>
						<button name="login" type="submit" class="btn btn-info pull-right">Login</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div><!--middle Containt-->
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
	</div><!--Whole container-->
	
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
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../css/assets/js/demo.js"></script>

</html>