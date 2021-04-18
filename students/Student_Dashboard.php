<?php
include_once("../config.php");
include("user_session.php");

$res = $mysqli->query("SELECT * FROM student where enrollment=$login_session");
					while($row=$res->fetch_array())
					{
							$name= $row['student_name'];
							$dept= $row['dept'];
							$sem= $row['sem'];
							if($row['rating_stat'])
							{
								header("location:feedback_done.php");
							}
					}
	include_once '../config.php';
	if (isset($_POST['submit'])){
	
	$row1=$_POST['row1'];
	$row2=$_POST['row2'];
	$row3=$_POST['row3'];
	$row4=$_POST['row4'];
	
	$row_size=sizeof($row1);
	for ($i=0;$i<$row_size;$i++) {
	$row1[$i]=$row1[$i]+$row2[$i]+$row3[$i]+$row4[$i];//AVG of Timeliness From Faculty 1 to N	
	}
	
	for ($i=0;$i<$row_size;$i++) {
	$timeliness[$i]= round(($row1[$i]/4),4);
	}
	
	$row5=$_POST['row5'];
	$row6=$_POST['row6'];
	$row7=$_POST['row7'];
	$row8=$_POST['row8'];
	$row9=$_POST['row9'];
	$row10=$_POST['row10'];
	$row11=$_POST['row11'];
	
	$row_size=sizeof($row5);
	for ($i=0;$i<$row_size;$i++) {
	$row5[$i]=$row5[$i]+$row6[$i]+$row7[$i]+$row8[$i]+$row9[$i]+$row10[$i]+$row11[$i];//AVG of Effectiveness From Faculty 1 to N
	}
	
	for ($i=0;$i<$row_size;$i++) {
	$effectiveness[$i]= ($row5[$i]/7);
	}
	
	$row12=$_POST['row12'];
	$row13=$_POST['row13'];
	$row14=$_POST['row14'];
	$row15=$_POST['row15'];
	$row16=$_POST['row16'];
	
	$row_size=sizeof($row1);
	for ($i=0;$i<$row_size;$i++) {
	$row12[$i]=$row12[$i]+$row13[$i]+$row14[$i]+$row15[$i]+$row16[$i];//AVG of Control and Attitude From Faculty 1 to N
	}
	
	for ($i=0;$i<$row_size;$i++) {
	$control_n_attitude[$i]= ($row12[$i]/5);
	}
	
	$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
	for ($i=0;$i<$row_size;$i++)
	{	
		$total_avg=($timeliness[$i]+$effectiveness[$i]+$control_n_attitude[$i])/3;
		if(!empty($total_avg)){
		$row=$res->fetch_array();
		$sql="INSERT INTO `feedbacks`(`feedback_id`,`enrollment`,`faculty_id`, `faculty_name`, `subject`, `dept`, `sem`, `Timeliness`, `Effectiveness`, `Control_and_Attitude`, `Avg_Total`) VALUES (NULL,'$login_session','$row[id]','$row[faculty_name]','$row[subject]','$dept','$sem','$timeliness[$i]','$effectiveness[$i]','$control_n_attitude[$i]','$total_avg')";
		if (!mysqli_query($mysqli,$sql))
		  {
		  die('Error: ' . mysqli_error($mysqli));
		  }
		$name= $row['faculty_name'];
		$sql="UPDATE `faculty` SET `stat`=1 WHERE faculty_name='$name'";
		mysqli_query($mysqli,$sql); 
		}
	
	}
	$sql="UPDATE `student` SET `rating_stat`=1 WHERE enrollment=$login_session";
	if (mysqli_query($mysqli,$sql))
		{
		header('Location:feedback_done.php');
		}
	}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../css/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../css/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
	<link href="../css/assets/css/material-icons.css" rel="stylesheet" />	
	<script src="../js/jquery-2.1.3.min.js"></script>
	<script src="../js/metro.js"></script>
	<script src="../js/docs.js"></script>
	</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="royal" >
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
				<i><a class="col-md-offset-2"href="../index.php"><img src="../images/logo2.png" ></a></i>
			</div>
            <div class="sidebar-wrapper">
				<ul class="nav">
                    <li class="active">
                        <a href="Student_Dashboard.php">
                            <i class="material-icons">content_paste</i>
                            <p>Feedback Form</p>
                        </a>
                    </li>
					 <li>
                        <a href="Student_Profile.php">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
					<li>
                        <a href="../logout.php">
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
                        <div class="col-lg-10 col-md-12">
                            <div class="card">
								<div class="card-header" data-background-color="royal">
									<h4 class="title">Feedback Form</h4>
									<!--p class="category"></p-->
								</div>
						<div class="card-content">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
							<table class="table">
								<tr>
									<th colspan="100%" scope="colgroup" class="text-royalblue">KINDLY RATE THE FACULTIES ON SCALE OF 1 TO 5.<br><i > (Rating: 5-Excellent,4-Very Good,3-Good,2-Average,1-Below Average)</i></th>
								</tr>
								  <tr>
									<th rowspan="3">SR. NO</th>
									<th rowspan="3" colspan="2">Questions</th>
									
									<th colspan="100%" scope="colgroup">Name of Faculties</th>
								  </tr>
								  <tr>
									<th scope="col">Fauclty Name</th>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><?php echo $row['faculty_name']; ?></th>
											<?php
										}
										?>
								  </tr>
								  <tr>
									<th scope="row">Subjects</th>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><?php echo $row['subject']; ?></th>
											<?php
										}
										?>
								  </tr>

								<tr>
									<th id="par" class="span" colspan="100%" scope="colgroup">
										<center>Timeliness</center>
									</th>
								</tr>
								<tr>
									<td >
										1
									</td>
									<td colspan="3">
										Punctual and Regular to the class
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row1[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
									<tr>
									<td id="pbed1">
										2
									</td>
									<td colspan="3">
										Completes Syllabus as scheduled
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row2[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
									<tr>
									<td id="pbed1">
										3
									</td>
									<td colspan="3">
										Assignments, tests are done as per schedule
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row3[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr><tr>
									<td id="pbed1">
										4
									</td>
									<td colspan="3">
										Makes proper altenate arrangement in absence
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row4[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>

							<tr>
									<th id="par" class="span" colspan="100%" scope="colgroup">
									<center>Teaching Effectiveness</center>
									</th>
								</tr>
								<tr>
									<td id="pbed1">
										1
									</td>
									<td colspan="3">
										Communication skill
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row5[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td colspan="3">
										Delivery of lecture is structured and interactive
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row6[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
								<tr>
									<td id="pbed1">
										3
									</td>
									<td " colspan="3">
										Links subject to practical excamples and creates interest
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row7[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>

								<tr>
									<td id="pbed1">
										4
									</td>
									<td " colspan="3">
										Refers to latest devvelopments in the field
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required  type="number" name="row8[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>

								<tr>
									<td id="pbed1">
										5
									</td>
									<td " colspan="3">
										Uses black board well and uses other teaching aids
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row9[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>

								<tr>
									<td id="pbed1">
										6
									</td>
									<td " colspan="3">
										Solves the Question papers of class tests/sessional tests 
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row10[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>

								<tr>
									<td id="pbed1">
										7
									</td>
									<td " colspan="3">
										Refers to other sources like e-journals,open sources,etc
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required  type="number" name="row11[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>

								<tr>
									<th id="par" class="span" colspan="100%" scope="colgroup">
									<center>Class Control And Attitude</center>
									</th>
								</tr>
								<tr>
									<td  id="pbed1">
										1
									</td>
									<td  colspan="3">
										Faculty manages improper behaviour in class room
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row12[]"min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
								<tr>
									<td  id="pbed1">
										2
									</td>
									<td  colspan="3">
										Makes class interactive and participative
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row13[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
								<tr>
									<td  id="pbed1">
										3
									</td>
									<td  colspan="3">
										Helps students in overcoming their deficiencies
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row14[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
								<tr>
									<td  id="pbed1">
										4
									</td>
									<td  colspan="3">
										Respects students and gives emotional support
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row15[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
								<tr>
									<td  id="pbed1">
										5
									</td>
									<td  colspan="3">
										Motivates for realizing career goals
									</td>
									<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
											<th><input required type="number" name="row16[]" min="1" max="5"/></th>
											<?php
										}
										?>
								</tr>
							</table>
								<button class="btn btn-info pull-right"type="submit" name="submit"> 
								Submit
								</button>
							</form>
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