<?php
require_once './PHPExcel.php';
require_once './PHPExcel/IOFactory.php';
echo getcwd() . "\n";
$objPHPExcel = PHPExcel_IOFactory::load("recpt_template.xls");
$objPHPExcel->setActiveSheetIndex(0);

$startIndex = 24;
$row = $startIndex;

//
$slNo = 1;
$desc = "Bread";
$qty = "2";
$unit = "Piece";
$rate = 12;
$amount = 12;
//

$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $slNo);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $desc);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $qty);
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $unit);
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $rate);
$objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $amount);

/*$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $_POST['email']);
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $_POST['phone']);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $_POST['city']);
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $_POST['kid1']);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $_POST['kid2']);*/
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('sujit.xlsx');