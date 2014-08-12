<?php

require_once '../model/BO/Product_BO.php';
require_once '../model/DAO/Product_DAO.php';
require_once '../model/TO/Product_TO.php';
require_once '../model/TO/Prod_Account_TO.php';
require_once '../model/BO/ProductAccount_BO.php';
require_once '../model/DAO/Product_Account_DAO.php';

class ProductServlet {

    private $prodBO;
    private $prodTO;
    private $prodAccountTO;
    private $prodAccountBO;

    public function __construct() {
        $this->prodBO = new ProductBO();
        $this->prodTO = new ProductTO();
        $this->prodAccountTO = new ProdAccountTO();
        $this->prodAccountBO = new ProductAccountBO();
    }

    public function manageProduct() {
        $oprCode = $_POST['oprCode'];
        switch ($oprCode) {
            case "Insert" :
                $this->insertProduct();
                break;
            case "read":
                $this->read();
                break;
            case "readAll" :
                $this->readAll();
                break;
            case "Update" :
                $this->update();
                break;
            case "Remove" :
                $this->delete();
                break;
            case "readByFK":
                $this->readByFK();
                break;
            case "readCost":
                $this->readCost();
                break;
            case "UpdateCost":
                $this->updateCost();
                break;
        }
    }

    private function insertProduct() {
        $prodName = $_POST['prodName'];
        $brandID = $_POST['brandID'];
        $prodUnit = $_POST['prodUnit'];
        $prodPerBox = $_POST['prodPerBox'];
        $prodID = AimsUtility::getID();
        $isProdExist = $this->prodBO->checkProduct($prodName, $brandID);
        if ($isProdExist == null) {
            $this->prodTO->set_BRAND_ID($brandID);
            $this->prodTO->set_PROD_ID($prodID);
            $this->prodTO->set_PROD_NAME($prodName);
            $this->prodTO->set_PROD_UNIT($prodUnit);
            $this->prodTO->set_PRODS_PER_BOX($prodPerBox);
            $this->prodTO->set_PROD_AVAIL(0);
            $this->prodBO->create($this->prodTO);
            $prodAccountTO = new ProdAccountTO();
            $prodAccountTO->set_PROD_ID($prodID);
            $prodAccountTO->set_PROD_UNIT($prodUnit);
            $prodAccountTO->set_DISCOUNT(0);
            $prodAccountTO->set_VAT(0);
            $prodAccountTO->set_BASIC_COST(0);
            $prodAccountBO = new ProductAccountBO();
            if($prodUnit == "box"){
                $prodAccountBO->create($prodAccountTO);
                $prodAccountTO->set_PROD_UNIT("pac");
                $prodAccountBO->create($prodAccountTO);
            } else{
                $prodAccountBO->create($prodAccountTO);
            }
            
            echo $prodName." is added.";
        } else {
            echo "Product Already Exist";
        }
    }

    private function read() {
        $prodID = $_POST['prodID'];
        $brandID = $_POST['brandID'];
        $quantity = $_POST['quantity'];
        $this->prodTO = $this->prodBO->read($prodID);
        $avail = $this->prodTO->get_PROD_AVAIL();
        if($quantity>$avail){
            echo "Sorry<br/>In Stock : ".$avail;
        } else{
            echo "No Problem";
        }
    }

    /*  private function readAll() {
      echo '<select id="selectBrand">';
      echo '<option value ="0">SELECT</option>';
      foreach ($this->brandBO->readAll() as $this->brandTO) {
      echo '<option value = "' . $this->brandTO->get_BRAND_ID() . '">' . $this->brandTO->get_BRAND_NAME() . '</option>';
      }
      echo '</select>';
      } */

    private function update() {
        $prodID = $_POST['prodID'];
        $brandID = $_POST['brandID'];
        $prodName = $_POST['prodName'];
        $prodAvail = $_POST['prodAvail'];
        $isVrandExist = $this->prodBO->checkProduct($prodName, $brandID);

        if ($isVrandExist == null) {
            $this->prodTO->set_PROD_ID($prodID);
            $this->prodTO->set_BRAND_ID($brandID);
            $this->prodTO->set_PROD_NAME($prodName);
            $this->prodTO->set_PROD_AVAIL($prodAvail);
            $this->prodBO->update($this->prodTO);
        } else {
            echo "Brand Name already Exists.";
        }
    }

    private function delete() {
        $prodID = $_POST['prodID'];
        $this->prodBO->delete($prodID);
    }

    private function readByFK() {
        $brandID = $_POST['brandID'];
        $json[] = array();
        //var_dump($this->prodBO->readAllByFK($brandID));
        $productList = $this->prodBO->readAllByFK($brandID);
        if ($productList == null) {
            $json =  "ERR102";
        } else {
            $json = $productList;
        }
         echo json_encode($json); 
    }

    private function readCost() {
        $prodID = $_POST['prodID'];
        $unit = $_POST['unit'];
        echo json_encode($this->prodAccountBO->read($prodID,$unit));
    }

    private function updateCost() {
        $prodID = $_POST['prodID'];
        $basicCost = $_POST['basicCost'];
        $vat = $_POST['vat'];
        $discount = $_POST['discount'];
        $this->prodAccountTO->set_PROD_ID($prodID);
        $this->prodAccountTO->set_BASIC_COST($basicCost);
        $this->prodAccountTO->set_VAT($vat);
        $this->prodAccountTO->set_DISCOUNT($discount);
        $this->prodAccountBO->update($this->prodAccountTO);
    }

}
