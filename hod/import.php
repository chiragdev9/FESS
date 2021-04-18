<?php
$connect = mysqli_connect("localhost", "root", "", "fess");
$output = '';
if(isset($_POST["import"]))
{
 $basenameAndExtension = explode(".", $_FILES["excel"]["name"]); // For getting Extension of selected file
 $extension = end($basenameAndExtension);
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("lib/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $subject = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $sem = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
	$query = "INSERT INTO faculty(faculty_name, subject, dept,sem,stat) VALUES ('".$name."', '".$subject."', '".$_POST['dept']."', '".$sem."','0')";
    mysqli_query($connect, $query);
   }
  } 
  $output .= '</table>';
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
  header("Location: HOD_Dashboard.php?import=true");//TO notify which faculty ID Deleted		
}
?>