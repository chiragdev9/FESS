<?php
include_once("../config.php");
include("user_session.php");

		$row1=$_POST['row1'];
		$row_size=sizeof($row1);
		for ($i=0;$i<$row_size;$i++) {
			if($row1[$i]==""){
				echo $row1[$i];
				echo "nul";
			}
			else{
			echo "not nul";
			}
		}
/*		if (isset($_POST['submit'])){
			$row1=$_POST['row1'];
			$row2=$_POST['row2'];
			$row3=$_POST['row3'];
			$row4=$_POST['row4'];
			
			$row_size=sizeof($row1);

			for ($i=0;$i<$row_size;$i++) {
				if($row1[$i]==""){
					header('Location:student_test.php?input=false');
				}
				else{
					$row1[$i]=$row1[$i]+$row2[$i]+$row3[$i]+$row4[$i];//AVG of Timeliness From Faculty 1 to N	
				}
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
				if(is_null($row1[$i])){
					header('Location:student_test.php?input=false');
				}
				else{
					$row5[$i]=$row5[$i]+$row6[$i]+$row7[$i]+$row8[$i]+$row9[$i]+$row10[$i]+$row11[$i];//AVG of Effectiveness From Faculty 1 to N
				}
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
				if(is_null($row1[$i])){
					header('Location:student_test.php?input=false');
				}
				else{
					$row12[$i]=$row12[$i]+$row13[$i]+$row14[$i]+$row15[$i]+$row16[$i];//AVG of Control and Attitude From Faculty 1 to N
				}
			}

			for ($i=0;$i<$row_size;$i++) {
				$control_n_attitude[$i]= ($row12[$i]/5);
			}

			$res = $mysqli->query("SELECT * FROM faculty where sem='$sem' AND dept='$dept'");
			for ($i=0;$i<$row_size;$i++){	
				$total_avg=($timeliness[$i]+$effectiveness[$i]+$control_n_attitude[$i])/3;
				$row=$res->fetch_array();
				$sql="INSERT INTO `feedbacks`(`feedback_id`, `enrollment`, `faculty_name`, `subject`, `dept`, `sem`, `Timeliness`, `Effectiveness`, `Control_and_Attitude`, `Avg_Total`) VALUES (NULL,'$login_session','$row[faculty_name]','$row[subject]','$dept','$sem','$timeliness[$i]','$effectiveness[$i]','$control_n_attitude[$i]','$total_avg')";

				if (!mysqli_query($mysqli,$sql)){
					die('Error: ' . mysqli_error($mysqli));
				}
				
				$name= $row['faculty_name'];
				$sql="UPDATE `faculty` SET `stat`=1 WHERE faculty_name='$name'";
				mysqli_query($mysqli,$sql); 			
			}
			
			$sql="UPDATE `student` SET `rating_stat`=1 WHERE enrollment=$login_session";
			if (mysqli_query($mysqli,$sql)){
				header('Location:feedback_done.php');
			}

		}*/
?>
