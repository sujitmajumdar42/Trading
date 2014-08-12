<?php

require_once './User_Servlet.php';
require_once './Brand_Servlet.php';
require_once './Product_Servlet.php';
require_once './../model/util/AIMSUtil.php';
require_once '../config/DbConfig.php';
require_once '../controller/rcpt/ReceiptCreator.php';
require_once '../controller/rcpt/PHPExcel.php';
require_once '../controller/rcpt/PHPExcel/IOFactory.php';
require_once '../model/DAO/Rcpt_Detail_DAO.php';
class Router {

    public function route() {
        $servType = $_POST['servType'];

        switch ($servType) {
            case 'UsrLogin' :
                $obj = new UserServlet();
                $obj->doLogin();
                break;
            case 'BrandManage' :
                $obj = new BrandServlet();
                $obj->manageBrand();
                break;
            case 'ProdManage' :
                $obj = new ProductServlet();
                $obj->manageProduct();
                break;
            case 'ProdAccountManager':
                $obj = new ProductServlet();
                $obj->manageProduct();
                break;
            case 'UserLogin':
                 new UserServlet();
                break;
            case 'LogOut':
                $this->logout();
                break;
            case 'makeReceipt':
                new RcptCreator();
                break;
                
        }
    }
    
    function logout(){
        unset($_SESSION['uname']);
    }

}

$obj = new Router();
$obj->route();

