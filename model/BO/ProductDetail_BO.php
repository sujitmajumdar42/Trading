<?php

class ProductDetailBO{
    private $productDetailDAO = null;
    function __construct() {
        $this->productDetailDAO = new ProductDetailDAO();
    }
    function create($productTO){
        $this->productDetailDAO->create($productTO);
    }
    function read($productID){
         return $this->productDetailDAO->read($productID);
    }
    function readAll(){
        return $this->productDetailDAO->readAll();
    }
    function update($productTO){
        $this->productDetailDAO->update($productTO);
    }
    function delete($productID){
        $this->productDetailDAO->delete($productID);
    }
}