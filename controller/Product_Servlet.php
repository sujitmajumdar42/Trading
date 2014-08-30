<?php

require_once '../model/BO/Product_BO.php';
require_once '../model/DAO/Product_DAO.php';
require_once '../model/TO/Product_TO.php';
require_once '../model/TO/Prod_Account_TO.php';
require_once '../model/TO/Prod_Repo_TO.php';
require_once '../model/BO/ProductAccount_BO.php';
require_once '../model/DAO/Product_Account_DAO.php';
require_once '../model/DAO/Prod_Repo_DAO.php';

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
            case "updateCost":
                $this->updateCost();
                break;
            case "checkAvail":
                $this->checkAvail();
                break;
            case "updateRepo":
                break;
            case "updateProdToRepo":
                $this->updateProdToRepo();
                break;
            case "getProdInfo":
                $this->getProdInfo();
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
            $this->prodTO->set_PROD_IN_BOX($prodPerBox);
            $this->prodBO->create($this->prodTO);

            //Add to account
            $prodAccountTO = new ProdAccountTO();
            $prodAccountTO->set_PROD_ID($prodID);
            $prodAccountTO->set_PROD_PAC_COST(0);
            $prodAccountTO->set_DISCOUNT(0);
            $prodAccountTO->set_VAT(0);
            $prodAccountBO = new ProductAccountBO();
            if ($prodUnit == "pac") {
                $prodAccountTO->set_PROD_BOX_COST(-1);
            } else {
                $prodAccountTO->set_PROD_BOX_COST(0);
            }
            $prodAccountBO->create($prodAccountTO);
            //Add to Repo
            $prodRepoTO = new ProdRepoTO();
            $prodRepoTO->set_PROD_ID($prodID);
            $prodRepoTO->set_PROD_UNIT($prodUnit);
            $prodRepoTO->set_PROD_AVAIL(0);
            if ($prodUnit == "box") {
                $this->prodBO->addToRepo($prodRepoTO);
            }
            $prodRepoTO->set_PROD_UNIT("pac");
            $this->prodBO->addToRepo($prodRepoTO);

            echo "INF_PR_01";
        } else {
            echo "ERR_PR_04";
        }
    }

    private function read() {
        $prodID = $_POST['prodID'];
        $brandID = $_POST['brandID'];
        $quantity = $_POST['quantity'];
        $this->prodTO = $this->prodBO->read($prodID);
        $avail = $this->prodTO->get_PROD_AVAIL();
        if ($quantity > $avail) {
            echo "Sorry<br/>In Stock : " . $avail;
        } else {
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
        $isBrandExist = $this->prodBO->checkProduct($prodName, $brandID);

        if ($isBrandExist == null) {
            $this->prodTO->set_PROD_ID($prodID);
            $this->prodTO->set_BRAND_ID($brandID);
            $this->prodTO->set_PROD_NAME($prodName);
            $this->prodBO->update($this->prodTO);
            echo "INF_PR_02";
        } else {
            echo "ERR_PR_04";
        }
    }

    private function delete() {
        $prodID = $_POST['prodID'];
        $respCode = $this->prodBO->delete($prodID);
        if ($respCode == 1) {
            echo "ERR_PR_07";
        } else {
            echo "INF_PR_03";
        }
    }

    private function readByFK() {
        $brandID = $_POST['brandID'];
        $json[] = array();
        //var_dump($this->prodBO->readAllByFK($brandID));
        $productList = $this->prodBO->readAllByFK($brandID);
        if ($productList == null) {
            $json = "ERR_PR_01";
        } else {
            $json = $productList;
        }
        echo json_encode($json);
    }

    private function readCost() {
        $prodID = $_POST['prodID'];
        if($this->prodAccountBO->read($prodID)!=false){
            echo json_encode($this->prodAccountBO->read($prodID));
        } else{
            echo "ERR_PR_12";
        }
        
    }

    private function updateCost() {
        $prodID = $_POST['prodID'];
        $costPerPiece = $_POST['costPerPiece'];
        $costPerBox = $_POST['costPerBox'];
        $vat = $_POST['vat'];
        $this->prodAccountTO->set_PROD_ID($prodID);
        $this->prodAccountTO->set_PROD_PAC_COST($costPerPiece);
        $this->prodAccountTO->set_PROD_BOX_COST($costPerBox);
        $this->prodAccountTO->set_VAT($vat);
        $this->prodAccountTO->set_DISCOUNT(0);
        $response =  $this->prodAccountBO->update($this->prodAccountTO);
        if($response==0){
            echo "INF_PR_05";
        } else{
            echo "ERR_PR_13";
        }
    }

    private function checkAvail() {
        $prodID = $_POST['prodID'];
        //$prodUnit = $_POST['prodUnit'];
        $isBox = $this->prodBO->checkAvail($prodID, "box");
        if (empty($isBox) != 1) {
            $prodAvailBox = $this->prodBO->checkAvail($prodID, "box")->get_PROD_AVAIL();
            $prodAvailPac = $this->prodBO->checkAvail($prodID, "pac")->get_PROD_AVAIL();
            echo $prodAvailBox . "e" . $prodAvailPac;
        } else {
            $prodAvailPac = $this->prodBO->checkAvail($prodID, "pac")->get_PROD_AVAIL();
            echo $prodAvailPac;
        }
    }

    private function updateRepo() {
        $prodID = $_POST['prodID'];
        $prodUnit = $_POST['prodUnit'];
        $prodAvail = $_POST['prodAvail'];
        $prodRepoTO = new ProdRepoTO();
        $prodRepoTO->set_PROD_ID($prodID);
        $prodRepoTO->set_PROD_UNIT($prodUnit);
        $prodRepoTO->set_PROD_AVAIL($prodAvail);
        $this->prodBO->updateRepo($prodRepoTO);
    }

    private function updateProdToRepo() {
        $prodID = $_POST['prodID'];
        $prodUnit = $_POST['unit'];
        $quantity = $_POST['quantity'];
        $type = $_POST['type'];
        if($type == "REMOVE"){
            echo json_encode($this->prodAccountBO->read($prodID));
        }
        $this->prodBO->updateToRepo($prodID, $prodUnit, $quantity, $type);
        
    }
    
    private function getProdInfo(){
        $prodID = $_POST['prodID'];
        $json[] = array();
        $json = json_encode($this->prodBO->read($prodID));
        echo $json;
    }
}
