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
        $productNums = $_POST['productNums'];
        $productDescs = $_POST['productDescs'];
        $prodQtys = $_POST['prodQtys'];
        $prodRates = $_POST['prodRates'];
        $prodAmounts = $_POST['prodAmounts'];
        $totalRow = $_POST['totalRow'];
        
        $rowIndex = 24;
        $index = 0;
        
        $objPHPExcel->getActiveSheet()->insertNewRowBefore($rowIndex, $totalRow);
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('B'.$rowIndex.':C'.$rowIndex);
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowIndex, $index+1);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowIndex, $productDescs[0]);
         
        
        
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('sujit.xlsx');
    }

}
