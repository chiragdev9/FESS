<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('Europe/London');
/** Include PHPExcel */
require_once ('lib/PHPExcel.php');
// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();
// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Sigma_FESS")
							 ->setLastModifiedBy("Chirag Thakur")
							 ->setTitle("Office 2007 XLSX FESS Document")
							 ->setSubject("Office 2007 XLSX FESS Document")
							 ->setDescription("FESS document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
// Create a first sheet, representing sales data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0);

$styleArray = array(
    'font' => array(
        'bold' => true,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
            'color' => array('argb' => 'FF000000'),
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);

$objPHPExcel->getActiveSheet()->mergeCells('A1:B1');
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'R1-Timeliness');
$objPHPExcel->getActiveSheet()->mergeCells('C1:D1');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'R2-Teaching Effectiveness');
$objPHPExcel->getActiveSheet()->mergeCells('E1:G1');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'R3-Class Control & Attitude');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Ro-Overall Rating');
$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->mergeCells('A2:B2');
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Ratings below 2 are in ');
$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'RED');
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
$objPHPExcel->getActiveSheet()->mergeCells('D2:E2');
$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Ratings Above 4 are in ');
$objPHPExcel->getActiveSheet()->getStyle('D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->setCellValue('F2', 'GREEN');
$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKGREEN);
$objPHPExcel->getActiveSheet()->setCellValue('G2', 'Date');
$objPHPExcel->getActiveSheet()->setCellValue('H2', date('F d, Y'));
$objPHPExcel->getActiveSheet()->getStyle('G2:H2')->applyFromArray($styleArray);

	$dept = $_GET['dept'];
	include_once '../config.php';
	$res1 = $mysqli->query("SELECT `id`,`faculty_name`FROM `faculty` WHERE dept='$dept' AND stat=1");
	

$styleArray = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK,
            'color' => array('argb' => 'FF000000'),
        ),
    ),
);

	$objConditional1 = new PHPExcel_Style_Conditional();
	$objConditional1->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
	$objConditional1->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_LESSTHAN);
	$objConditional1->addCondition('2');
	$objConditional1->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
	$objConditional1->getStyle()->getFont()->setBold(true);

	$objConditional2 = new PHPExcel_Style_Conditional();
	$objConditional2->setConditionType(PHPExcel_Style_Conditional::CONDITION_CELLIS);
	$objConditional2->setOperatorType(PHPExcel_Style_Conditional::OPERATOR_GREATERTHANOREQUAL);
	$objConditional2->addCondition('4');
	$objConditional2->getStyle()->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKGREEN);
	$objConditional2->getStyle()->getFont()->setBold(true);

	$conditionalStyles = $objPHPExcel->getActiveSheet()->getStyle('D5:G5')->getConditionalStyles();
	array_push($conditionalStyles, $objConditional1);
	array_push($conditionalStyles, $objConditional2);

$rowCNT=7;
$srnum=1;
	while($row1=$res1->fetch_array())
	{	
	$res = $mysqli->query("SELECT `faculty_id` ,`faculty_name`, `subject`, `sem`, avg(`Timeliness`) as `Timeliness`, avg(`Effectiveness`) as `Effectiveness`, avg(`Control_and_Attitude`) as `Control_and_Attitude`, avg(`Avg_Total`) as `Avg_Total` FROM `feedbacks` WHERE dept='$dept' AND faculty_id='$row1[id]'");
		while($row=$res->fetch_array())	
		{	
			if($row['Avg_Total']!=null)
			{
			$objPHPExcel->getActiveSheet()->getStyle('A'.($rowCNT-2).':H'.($rowCNT))->applyFromArray($styleArray);
			$objPHPExcel->getActiveSheet()->mergeCells('A'.($rowCNT-2).':B'.($rowCNT-2));
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($rowCNT-2), 'Name of faculty:');

			$objPHPExcel->getActiveSheet()->mergeCells('C'.($rowCNT-2).':F'.($rowCNT-2));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($rowCNT-2), $row['faculty_name']);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($rowCNT-2), 'Dept:');
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($rowCNT-2), $dept);

			$objPHPExcel->getActiveSheet()->setCellValue('A'.($rowCNT-1), 'Sr.No');
			$objPHPExcel->getActiveSheet()->setCellValue('B'.($rowCNT-1), 'Rating By');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($rowCNT-1), 'Subject');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.($rowCNT-1), 'R1');
			$objPHPExcel->getActiveSheet()->setCellValue('E'.($rowCNT-1), 'R2');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($rowCNT-1), 'R3');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($rowCNT-1), 'Ro');
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($rowCNT-1), 'Remarks');
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCNT,$srnum );
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCNT, $row['sem']);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCNT, $row['subject']);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCNT, number_format(round($row['Timeliness'],4), 4));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCNT, number_format(round($row['Effectiveness'],4), 4));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCNT, number_format(round($row['Control_and_Attitude'],4), 4));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCNT, number_format(round($row['Avg_Total'],4), 4));

			$objPHPExcel->getActiveSheet()->getStyle('D'.$rowCNT)->setConditionalStyles($conditionalStyles);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$rowCNT)->setConditionalStyles($conditionalStyles);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCNT)->setConditionalStyles($conditionalStyles);
			$objPHPExcel->getActiveSheet()->getStyle('G'.$rowCNT)->setConditionalStyles($conditionalStyles);
			$objPHPExcel->getActiveSheet()->getStyle('H'.$rowCNT)->getFill()
				->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				->getStartColor()->setARGB('FFF0F0F0');	
			$rowCNT+=4;
			$srnum++;
			}
		}
	}


$objPHPExcel->getSecurity()->setLockWindows(true);
$objPHPExcel->getSecurity()->setLockStructure(true);
$objPHPExcel->getSecurity()->setWorkbookPassword("PHPExcel");
$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);


// Add conditional formatting
echo date('H:i:s') , " Add conditional formatting" , EOL;
// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$filename= $dept.'_Feedback_report_'.date('F d, Y').'.xlsx';

$objWriter->save($filename);
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
echo date('H:i:s') , " Done writing file" , EOL;
echo 'File has been created in ' , getcwd() , EOL;
header('location: '.$filename);