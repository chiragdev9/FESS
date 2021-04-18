<?PHP
include("../config.php"); 
include("user_session.php");
$res1 = $mysqli->query("SELECT * FROM hod where email='$login_session'");
			while($row=$res1->fetch_array())
			{
					$dept= $row['dept'];
			}//To get Department of HOD
			
					/* code for data delete */
			if(isset($_GET['del']))
			{
			 $SQL = $mysqli->query("DELETE FROM faculty WHERE id=".$_GET['del']);
			 $id=$_GET['del'];
			 header("Location: HOD_Dashboard.php?op=del&id=$id");//TO notify which faculty ID Deleted
			}
				if(isset($_GET['delall']))
				{
					if($_GET['delall']=='true')
					{
						$SQL = $mysqli->query("DELETE FROM faculty WHERE dept='$dept'");
						 header("Location: HOD_Dashboard.php?op=del&id=$id");
					}
				}
		if (isset($_POST['submit'])){	
			$sql="INSERT INTO `faculty`(`id`, `faculty_name`, `subject`, `dept`, `sem`, `stat`) VALUES (NULL,'$_POST[faculty_name]','$_POST[subject]','$dept','$_POST[sem]', 0) ";
		if (!mysqli_query($mysqli,$sql))
		  {
		  die('Error: ' . mysqli_error($mysqli));
		  }
		  else{
		  header("location: HOD_Dashboard.php?ins=true");
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
                    <li class="active">
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
					<li>
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
						</button></h5>
                    </div>
                </div>
            </nav><!--Collapsible Navbar-->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
							<?php
							if(isset($_GET['ins']))
								{
									$ins_msg =' <div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="material-icons">clear</i></span>
									</button>
									<span>
									<b> Faculty - </b> Inserted <sub></sub></span>
									</div>';
									echo $ins_msg;									
								}
							?>
                            <div class="card">
                                <div class="card-header" data-background-color="royal">
                                    <h4 class="title">Faculty Details</h4>
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
														<div class="form-group is-empty"><input required name="faculty_name" class="form-control" placeholder="Name..." type="text"/></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">library_books</i>
														</span>
														<div class="form-group is-empty"><input required name="subject"class="form-control" placeholder="Subject..." type="text"/></div>
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
							<form>
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
                                    <h4 class="title">Faculties & Subjects Detail</h4>
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
											<form action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
											<div class="form-group">
												<h6 class="small">Select File
												<input type="hidden" name="dept" value="<?php echo $dept;?>">
												<input type="file" name="excel" id="file" size="150"></h6>
												<button class="button"><i class="material-icons">insert_drive_file</i></button>
											</div>
											<button type="submit" class="btn btn-info" name="import" value="submit">Upload File</button>
											</form>
										</div>
									</div>
										<div class="col-md-6 col-md-offset-5 ">
											<a href="faculty_upload_format.xlsx"><button type="submit" class="btn btn-info" >Download Format</button></a>
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
									<b> Faculty'.$_GET['id'].' - </b> Deleted <sub></sub></span>
							</div>';
					echo $delete_msg;
							}
						?>
                            <div class="card">
                                <div class="card-header" data-background-color="royal">
                                    <h4 class="title">Faculties & Subjects</h4>
                                    <p class="category">List</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <th>Sr.No.</th>
                                            <th>Faculty Name</th>
                                            <th>Subject</th>
                                            <th>Semester</th>
											<th><a style="color:maroon;"href="?delall=true" onclick="return confirm('sure to delete all faculty details!'); " ><i class="material-icons">delete_sweep</i></a></th>
										<?php
										include_once '../config.php';
										$res = $mysqli->query("SELECT * FROM faculty where dept='$dept'");
										while($row=$res->fetch_array())
										{
										 ?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['faculty_name']; ?></td>
											<td><?php echo $row['subject']; ?></td>
											<td><?php echo $row['sem']; ?></td>
											<td><a style="color:maroon;"href="?del=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><i class="material-icons">delete_forever</i></a></td>
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