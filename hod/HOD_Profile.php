<?php
include("../config.php");
include("user_session.php");
	$res1 = $mysqli->query("SELECT * FROM hod where email='$login_session'");
			while($row=$res1->fetch_array())
					{
							$name= $row['hod_name'];
							$dept= $row['dept'];
							$phone= $row['phone'];	
					}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HOD Profile</title>
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
            <div class="logo">
				<a class="col-md-offset-2"href="../index.php"><img src="../images/logo2.png" /></a>
			</div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li >
                        <a href="HOD_Dashboard.php">
                            <i class="material-icons">assignment_ind</i>
                            <p>Faculties</p>
                        </a>
                    </li>
					<li>
                        <a href="Hod_Student.php">
                            <i class="material-icons">list</i>
                            <p>Students</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="Hod_Profile.php">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="Hod_Settings.php">
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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header" data-background-color="royal">
                                    <h4 class="title">HOD Profile</h4>
                                    <p class="category">Details </p>
                                </div>
                                <div class="card-content">
								<div class="row">
								<table class="table table-hover">
                                        <tbody>
											<tr>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">face</i>
														</span>
														<div class="form-group is-empty"><input disabled class="form-control" value="<?php echo $name?>"placeholder="HOD Name..." type="text"><span class="material-input"></span></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">library_books</i>
														</span>
														<div class="form-group is-empty"><input disabled class="form-control" value="<?php echo $dept?>"placeholder="Department...." type="text"><span class="material-input"></span></div>
													</div>
												</td>
											</tr>
                                            <tr>
											<tr>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">email</i>
														</span>
														<div class="form-group is-empty"><input disabled class="form-control" value="<?php echo $login_session?>"placeholder="abc@xyz.com" type="text"><span class="material-input"></span></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">phone</i>
														</span>
														<div class="form-group is-empty"><input disabled class="form-control" value="<?php echo $phone?>"placeholder="987-XXX-XXXX" type="text"><span class="material-input"></span></div>
													</div>
												</td>
											</tr>
                                        </tbody>
                                    </table>
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
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../css/assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</html>