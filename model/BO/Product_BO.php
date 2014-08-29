<?php

class ProductBO{
    private $productDAO = null;
    private $prodRepoDAO = null;
    private $prodAccountDAO = null;
    function __construct() {
        $this->productDAO = new ProductDAO();
        $this->prodRepoDAO = new ProdRepoDAO(); 
        $this->prodAccountDAO = new ProductAccountDAO();
    }
    function create($productTO){
        $this->productDAO->create($productTO);
    }
    function checkProduct($prodName,$brandID){
        return $this->productDAO->checkProduct($prodName,$brandID);
    }
    function read($productID){
         return $this->productDAO->read($productID);
    }
    function readAll(){
        return $this->productDAO->readAll();
    }
    function update($productTO){
        $this->productDAO->update($productTO);
    }
    function delete($productID){
        $totalAvailBOX = 0;
        $totalAvailPAC = 0;
        $prodRepoTO = $this->prodRepoDAO->checkRepo($productID, "pac");
        if(empty($prodRepoTO)!=1){
         $totalAvailPAC = $prodRepoTO->get_PROD_AVAIL();     
        }
        $prodRepoTO = $this->prodRepoDAO->checkRepo($productID, "box");
        if(empty($prodRepoTO)!=1){
            $totalAvailBOX = $prodRepoTO->get_PROD_AVAIL();
        }
        if($totalAvailPAC == 0 && $totalAvailBOX == 0){
            $this->prodRepoDAO->delete($productID);
        }
        $this->prodAccountDAO->delete($productID);
        return $this->productDAO->delete($productID);
    }
    
    function readAllByFK($brandID){
        return $this->productDAO->readAllByFK($brandID);
    }
    
    function addToRepo($prodRepoTO){
        $this->prodRepoDAO->create($prodRepoTO);
    }
    
    function updateRepo($prodRepoTO){
        $this->prodRepoDAO->update($prodRepoTO);
    }
    
    function removeRepo($productId,$prodUnit){
        $this->prodRepoDAO->delete($productId,$prodUnit);
    }
    
    function checkAvail($productID, $prodUnit){
        return $this->prodRepoDAO->checkRepo($productID, $prodUnit);
    }
    
    function updateToRepo($prodID, $prodUnit, $quantity, $type){
        return $this->prodRepoDAO->updateToRepo($prodID, $prodUnit, $quantity, $type);
    }
}