<?php
session_start();
 require_once '../model/BO/User_BO.php';
 require_once '../model/DAO/User_DAO.php';
 require_once '../model/TO/User_TO.php';
 
class UserServlet{
    private $userBO;
    private $userTO;
    
     public function __construct() {
         $this->userBO = new UserBO();
         $this->userTO = new UserTO();
         $this->manageUser();
     }
     
     function manageUser(){
         $oprCode = $_POST['oprCode'];
         switch($oprCode){
             case  'userLogin' :
                 $this->userLogin();
                 break;
         }
     }
     
     function userLogin(){
         $uname = $_POST['uname'];
         $pass = $_POST['pass'];
         $this->userTO =  $this->userBO->UserLogin($uname, $pass);
         if($this->userTO == null){
             echo "ERR100";
         }
         else{
             $_SESSION['uname']=$uname;
         }
     }
}
