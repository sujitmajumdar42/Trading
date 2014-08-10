<?php

class BrandBO{
    private $brandDAO = null;
    function __construct() {
        $this->brandDAO = new BrandDAO();
    }
    function create($brandTO){
        $this->brandDAO->create($brandTO);
    }
    function read($brandId){
         return $this->brandDAO->read($brandId);
    }
    function checkBrand($brandName){
        return $this->brandDAO->checkBrand($brandName);
    }
    function readAll(){
        return $this->brandDAO->readAll();
    }
    function update($brandTO){
        $this->brandDAO->update($brandTO);
    }
    function delete($brandID){
        $this->brandDAO->delete($brandID);
    }
}