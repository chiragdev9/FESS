<?PHP
include("../config.php"); 
include("user_session.php");
$res1 = $mysqli->query("SELECT * FROM hod where email='$login_session'");
while($row=$res1->fetch_array())
	{
		$dept= $row['dept'];
	}
	//Code to delete row 
	if(isset($_GET['del']))
	{
	 $SQL = $mysqli->query("DELETE FROM student WHERE enrollment=".$_GET['del']);
	 $id=$_GET['del'];
	 header("Location: HOD_Student.php?op=del&id=$id");//TO notify which faculty ID Deleted
	}
	if(isset($_GET['delall']))
	{
		if($_GET['delall']=='true')
		{
			$SQL = $mysqli->query("DELETE FROM student WHERE dept='$dept'");
			 header("Location: HOD_Student.php?op=del&id=$id");
		}
	}

if (isset($_POST['submit'])){
	$enrollment=$_POST['enrollment'];
	$password=md5($enrollment);
	$sql="INSERT INTO `student`(`enrollment`, `student_name`, `dept`, `sem`, `password`, `email`, `phone`, `rating_stat`) VALUES ('$_POST[enrollment]','$_POST[name]','$dept','$_POST[sem]','$password','$_POST[email]','$_POST[phone]','0') ";
if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
 else{
  header("location: HOD_Student.php?ins=true");
  }

 mysqli_close($mysqli);
}

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../css/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../css/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HOD Dashboard</title>
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
					<li class="active">
                        <a href="HOD_Student.php">
                            <i class="material-icons">list</i>
                            <p>Students</p>
                        </a>
                    </li>
                    <li>
                        <a href="HOD_Profile.php">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="HOD_Settings.php">
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
                        <div class="col-lg-10 col-md-12">
								<?php
							if(isset($_GET['ins']))
								{
							$ins_msg =' <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="material-icons">clear</i></span>
								</button>
								<span>
									<b> Student - </b> Inserted <sub></sub></span>
							</div>';
					echo $ins_msg;									}
							?>
                    
                            <div class="card">
                                <div class="card-header" data-background-color="royal">
                                    <h4 class="title">Student Details</h4>
                                    <p class="category">Entry Form </p>
                                </div>
                                <div class="card-content">
								<form action="<?php $_PHP_SELF?>" method="POST">
								<div class="row">
								<table class="table table-hover">
                                        <tbody>
											<tr>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">face</i>															
														</span>
														<div class="form-group is-empty"><input required name="name"class="form-control" placeholder="Student Name..." type="text"/></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">library_books</i>														
														</span>
														<div class="form-group is-empty"><input required pattern="[1-9]{1}[0-9]{11}"name="enrollment"class="form-control" placeholder="Enrollment No...." type="text"/></div>
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
														<div class="form-group is-empty"><input  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email"class="form-control" placeholder="abc@xyz.com..." type="text"/></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">phone</i>
														</span>
														<div class="form-group is-empty"><input pattern="[789][0-9]{9}"name="phone"class="form-control" placeholder="987-XXX-XXXX No...." type="text"></div>
													</div>
												</td>
											</tr>
                                            <tr>
												<td colspan="2">
													<div class="col-md-offset-5">
													<i class="material-icons">insert_invitation</i>
													  <select name="sem" style="Border:none; border-bottom: 1px solid #aaa;">
														<option>Semester One</option>
														<option>Semester Two</option>
														<option>Semester Three</option>
														<option>Semester Four</option>
														<option>Semester Five</option>
														<option>Semester Six</option>
														<option>Semester Seven</option>
														<option>Semester Eight</option>
														<select>
												  </div>
											    </td>
											</tr>
                                        </tbody>
                                    </table>
									<div class="col-md-6 col-md-offset-5 ">
                                    <button name="submit"type="submit" class="btn btn-info pull-right">Insert</button>
								    </div>
								</div>
								</form>
                            </div>
                        </div>
                    </div><!---Row Ends-->
					<div class="row">
						<div class="col-lg-10">
						<?php	
						if(isset($_GET['import']))
							{
								if($_GET['import']=='true')
								{
									$import_msg =' <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true"><i class="material-icons">clear</i></span>
										</button>
										<span>
											<b> Excel File  - </b> Successfully Uploaded <sub></sub></span>
									</div>';
									echo $import_msg;
								}
							}?>
							<div class="card">
								<div class="card-header" data-background-color="royal">
                                    <h4 class="title">Students Detail</h4>
                                    <p class="category">Upload Excel Data Sheet</p>
                                </div>
								 <div class="card-content table-responsive">
									 <div class="row">
										<div class="col-md-6 col-md-offset-5 ">
										<?php
											include("../config.php"); 
											$res1 = $mysqli->query("SELECT * FROM hod where email='$login_session'");
											while($row=$res1->fetch_array())
											{
												$dept= $row['dept'];
											}?>
											<form action="import1.php" method="POST" name="upload_excel" enctype="multipart/form-data">
											<div class="form-group">
												<h6 class="small">Select File
												<input type="hidden" name="dept" value="<?php echo $dept;?>">
												<input required type="file" name="excel" id="file" size="150"></h6>
												<button class="button"><i class="material-icons">insert_drive_file</i></button>
											</div>
											<button type="submit" class="btn btn-info" name="import" value="submit">Upload File</button>
											</form>
										</div>
									</div>
										<div class="col-md-6 col-md-offset-5 ">
											<a href="student_upload_format.xlsx"><button type="submit" class="btn btn-info" >Download Format</button></a>
										</div>
									
								 </div>
							</div>
						</div>
					</div>
					<div class="row">
                        <div class="col-lg-10">
							<?PHP
						if(isset($_GET['op']))
							{
							$delete_msg =' <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="material-icons">clear</i></span>
								</button>
								<span>
									<b> Faculty ID '.$_GET['id'].' - </b> Deleted <sub></sub></span>
							</div>';
					echo $delete_msg;							}
						?>
                            <div class="card">
                                <div class="card-header" data-background-color="royal">
                                    <h4 class="title">Students</h4>
                                    <p class="category">List</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <th>Er.No.</th>
                                            <th>Student Name </th>
                                            <th>Semester</th>
											<th>Email-ID</th>
                                            <th>Contact Number</th>
											<th><a style="color:maroon;"href="?delall=true" onclick="return confirm('sure to delete all students details!'); " ><i class="material-icons">delete_sweep</i></a></th>
											<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM student where dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
                                        <tbody>
											<tr>
												<td><?php echo $row['enrollment']; ?></td>
												<td><?php echo $row['student_name']; ?></td>
												<td><?php echo $row['sem']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['phone']; ?></td>
												<td><a style="color:maroon;"href="?del=<?php echo $row['enrollment']; ?>" onclick="return confirm('sure to delete !'); " ><i class="material-icons">delete_forever</i></a></td>
											</tr>
												<?php
											}
											?>
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
<!-- Material Dashboard javascript methods -->
<script src="../css/assets/js/material-dashboard.js?v=1.2.0"></script>

</html>