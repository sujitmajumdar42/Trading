<?php

require_once '../model/BO/Brand_BO.php';
require_once '../model/DAO/Brand_DAO.php';
require_once '../model/TO/Brand_TO.php';

class BrandServlet {

    private $brandBO;
    private $brandTO;

    public function __construct() {
        $this->brandBO = new BrandBO();
        $this->brandTO = new BrandTO();
    }

    public function manageBrand() {
        $oprCode = $_POST['oprCode'];
        switch ($oprCode) {
            case "insert" :
                $this->insertBrand();
                break;
            case "read":
            case "readAll" :
                $this->readAll();
                break;
            case "update" :
                $this->update();
                break;
            case "delete" :
                $this->delete();break;
        }
    }

    private function insertBrand() {
        $brandName = $_POST['brandName'];
        $brandID = AimsUtility::getID();
        $isVrandExist = $this->brandBO->checkBrand($brandName);
        if ($isVrandExist == null) {
            $this->brandTO->set_BRAND_ID($brandID);
            $this->brandTO->set_BRAND_NAME($brandName);
            $this->brandBO->create($this->brandTO);
        } else {
            echo "Brand Name already Exists.";
        }
    }

    private function readBrand() {
        $brandID = $_POST['brandID'];
        $this->brandTO = $this->brandBO->read($brandID);
        echo "NAME : " . $this->brandTO->get_BRAND_NAME();
    }

    private function readAll() {
        $json[] = array();    
        $json = $this->brandBO->readAll();
        echo json_encode($json);    
    }

    private function update() {
        $brandID = $_POST['brandID'];
        $brandName = $_POST['brandName'];
        $isVrandExist = $this->brandBO->checkBrand($brandName);
        if ($isVrandExist == null) {
            $this->brandTO->set_BRAND_ID($brandID);
            $this->brandTO->set_BRAND_NAME($brandName);
            $this->brandBO->update($this->brandTO);
        } else {
            echo "Brand Name already Exists.";
        }
    }
    
    private function delete(){
        $brandID = $_POST['brandID'];
         $this->brandTO->set_BRAND_ID($brandID);
         $this->brandBO->delete($this->brandTO->get_BRAND_ID());
    }
}
