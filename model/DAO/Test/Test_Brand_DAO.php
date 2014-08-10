<?php
require_once '../../TO/Brand_TO.php';
require_once '../../DAO/Brand_DAO.php';
require_once '../../../config/DbConfig.php';

class TestBrandDAO{
    private $brandDAO = null;
    private $brandTO = null;
    function __construct() {
        $this->brandDAO = new BrandDAO();
        $this->brandTO = new BrandTO();
    }
    function testCreate(){
        $this->brandTO->setBrandID("bb");
        $this->brandTO->setBrandName("HP");
        $this->brandDAO->create($this->brandTO);
    }
    function testRead(){
        $brandID = 'bb';
        $this->brandTO = $this->brandDAO->read($brandID);
        echo $this->brandTO->getBrandID();
    }
    function testReadAll(){
        $brandToList = $this->brandDAO->readAll();
        foreach($brandToList as $this->brandTO){
            echo "<br/>".$this->brandTO->getBrandID();
            echo "<br/>".$this->brandTO->getBrandName();
            echo "<br/>***<br/>";
        }
    }
    function testUpdate(){
        $this->brandTO->setBrandID('bb');
        $this->brandTO->setBrandName('HP');
        $this->brandDAO->update($this->brandTO);
    }
    function testDelete(){
        $this->brandDAO->delete("bb");
    }
}

$testBrandDAO = new TestBrandDAO(); 
$testBrandDAO->testCreate();
$testBrandDAO->testRead();
$testBrandDAO->testReadAll();
//$testBrandDAO->testDelete();
