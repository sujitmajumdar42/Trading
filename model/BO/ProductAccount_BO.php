<?php

class ProductAccountBO{
    private $productAccountDAO = null;
    function __construct() {
        $this->productAccountDAO = new ProductAccountDAO();
    }
    function create($productTO){
        $this->productAccountDAO->create($productTO);
    }
    function read($productID,$prodUnit){
         return $this->productAccountDAO->read($productID,$prodUnit);
    }
    function readAll(){
        return $this->productAccountDAO->readAll();
    }
    function update($productTO){
        $this->productAccountDAO->update($productTO);
    }
    function delete($productID){
        $this->productAccountDAO->delete($productID);
    }
}