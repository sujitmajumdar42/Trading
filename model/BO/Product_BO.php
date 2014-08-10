<?php

class ProductBO{
    private $productDAO = null;
    function __construct() {
        $this->productDAO = new ProductDAO();
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
        $this->productDAO->delete($productID);
    }
    
    function readAllByFK($brandID){
        return $this->productDAO->readAllByFK($brandID);
    }
}