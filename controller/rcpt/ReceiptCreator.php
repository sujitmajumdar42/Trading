<?php

class RcptCreator {

    function __construct() {
        $this->makeReceipt();
    }

    function makeReceipt() {
        $objPHPExcel = PHPExcel_IOFactory::load("../controller/rcpt/Rcpt_Template.xlsx");
        $objPHPExcel->setActiveSheetIndex(0);

        $custAddress = $_POST['custAddress'];
        $modeOfDispatch = $_POST['modeOfDispatch'];
        $transpName = $_POST['transpName'];
        $poNum = $_POST['poNum'];
        $remarks = $_POST['remarks'];
        $brands = $_POST['brands'];
        $productDescs = $_POST['productDescs'];
        $prodQtys = $_POST['prodQtys'];
        $units = $_POST['units'];
        $prodRates = $_POST['prodRates'];
        $taxes = $_POST['taxes'];
        $prodCosts = $_POST['prodCosts'];
        $totalRow = $_POST['totalRow'];
        $totalProds = $_POST['totalProds'];
        $totalCosts = $_POST['totalCosts'];

        $rowIndex = 24;
        $index = 0;

        $objPHPExcel->getActiveSheet()->insertNewRowBefore($rowIndex, $totalRow);
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A9', $custAddress);
        $objPHPExcel->getActiveSheet()->SetCellValue('H8', date("m/d/Y",time()));
        $objPHPExcel->getActiveSheet()->SetCellValue('H14', date("m/d/Y",time()));

        for ($iterator = 0; $iterator < $totalRow; $iterator++) {
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B' . $rowIndex . ':C' . $rowIndex);
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowIndex, $iterator+1);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowIndex, $brands[$iterator]."  ".$productDescs[$iterator]);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowIndex, $units[$iterator]);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowIndex, $prodQtys[$iterator]);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowIndex, $prodRates[$iterator]);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowIndex, $taxes[$iterator]);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowIndex, $prodCosts[$iterator]);
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('sujit.xlsx');
    }

}
