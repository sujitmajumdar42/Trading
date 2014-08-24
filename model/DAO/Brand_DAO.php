<?php

class BrandDAO {
    
    const CLASS_NAME = "BrandTO";
    const CREATE_QUERY = "INSERT INTO `trading`.`brand` (`BRAND_ID`, `BRAND_NAME`) VALUES (?, ?)";
    const READ_QUERY = "SELECT * FROM `trading`.`brand` WHERE `BRAND_ID`=?";
    const CHECK_BRAND_QUERY = "SELECT * FROM `trading`.`brand` WHERE `BRAND_NAME`=?";
    const READ_ALL_QUERY = "SELECT * FROM `trading`.`brand`";
    const UPDATE_QUERY = "UPDATE `trading`.`brand` SET `BRAND_NAME` = ? WHERE `brand`.`BRAND_ID` = ?";
    const DELETE_QUERY = "DELETE FROM `trading`.`brand` WHERE `brand`.`BRAND_ID` = ?";

    function create($brandTO) {
        $params = array($brandTO->get_BRAND_ID(), $brandTO->get_BRAND_NAME());
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }

    function read($brandId) {
        $params = array($brandId);
        return DbConfig::readQuery(self::READ_QUERY, $params,self::CLASS_NAME);
    }
    
    function checkBrand($brandName){
        $params = array($brandName);
        return DbConfig::readQuery(self::CHECK_BRAND_QUERY, $params,self::CLASS_NAME);
    }

    function readAll() {
        return DbConfig::readAllQuery(self::READ_ALL_QUERY,null, self::CLASS_NAME);
    }

    function update($brandTO) {
        $params = array($brandTO->get_BRAND_NAME(), $brandTO->get_BRAND_ID());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function delete($brandID) {
        $params = array($brandID);
        return DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }

}
