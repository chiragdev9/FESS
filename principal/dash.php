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
            <div class="logo">
				<a class="col-md-offset-2"href="../index.php"><img src="../images/logo2.png" /></a>
			</div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
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
							<span class="badge badge-info"><?PHP echo $_GET['dept'];?></span>
							<a href="feedback_report.php?dept=<?PHP echo $_GET['dept'];?>" class="badge badge-pill badge-info">
								<i class="material-icons">get_app</i> Download Report
							</a>
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
            				<div class="col-lg-10 col-md-offset-1">
							           <?php
										$dept = $_GET['dept'];
										include_once '../config.php';
										$res1 = $mysqli->query("SELECT `id`,`faculty_name`FROM `faculty` WHERE dept='$dept' AND stat=1");
										while($row1=$res1->fetch_array())
										{	
										$res = $mysqli->query("SELECT `faculty_id` ,`faculty_name`, `subject`, `sem`, avg(`Timeliness`) as `Timeliness`, avg(`Effectiveness`) as `Effectiveness`, avg(`Control_and_Attitude`) as `Control_and_Attitude`, avg(`Avg_Total`) as `Avg_Total` FROM `feedbacks` WHERE dept='$dept' AND faculty_id='$row1[id]'");
										$row=$res->fetch_array();
											if($row['Avg_Total']<=2)
											{
												$color='orange';
											}
											else
											{
												$color='green';
											}
											if($row['Avg_Total']!=null)
											{
										 ?>
										<div class="col-md-4 ">
											<div class="card">
											<div class="card-header card-chart" data-background-color="<?php echo $color?>">
												 <h5 class="title">Timeliness : 
												<div class="pull-right"><?php echo number_format(round($row['Timeliness'],4), 4); ?></div></h5>
												<h5 class="title">Effectiveness : 
												<div class="pull-right"><?php echo number_format(round($row['Effectiveness'],4), 4); ?></div></h5>
												<h5 class="title">Control and Attitude :
												<div class="pull-right"><?php echo number_format(round($row['Control_and_Attitude'],4), 4); ?></div></h5>
												<h4 class="title">Overall Rating :
												<div class="pull-right"><?php echo number_format(round($row['Avg_Total'],4), 4); ?></div></h4>
											</div>
											<div class="card-content">
												<h4 class="title"><?php echo $row['faculty_name']; ?></h4>
											   <p class="category"><?php echo $row['sem']; ?></p>
											</div>
											<div class="card-footer">
												<div class="stats">
													<i class="material-icons">library_books</i> <?php echo $row['subject']; ?>
												</div>
											</div>
											</div>
										</div>
											<?php
											}
										}
										?>
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