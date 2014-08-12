<?php

class ProductDAO {

    const CLASS_NAME = "ProductTO";
    const CREATE_QUERY = "INSERT INTO `trading`.`product` (`PROD_ID`, `BRAND_ID`, `PROD_NAME`,`PROD_UNIT`,`PROD_IN_BOX`, `PROD_AVAIL`) VALUES (?, ?, ?, ?, ?, ?)";
    const CHECK_QUERY = "SELECT * FROM `trading`.`product` WHERE `product`.`PROD_NAME` = ? AND `product`.`BRAND_ID` = ?";
    const READ_QUERY = "SELECT * FROM `trading`.`product` WHERE `PROD_ID`=?";
    const READ_ALL_QUERY = "SELECT * FROM `trading_db`.`product`";
    const UPDATE_QUERY = "UPDATE `trading`.`product` SET `PROD_NAME` = ?, `PROD_AVAIL` = ? WHERE `product`.`PROD_ID` = ?";
    const DELETE_QUERY = "DELETE FROM `trading`.`product` WHERE `product`.`PROD_ID` = ?";
    const READ_ALL_BY_FK = "SELECT * FROM `product` WHERE `BRAND_ID` = ?";

    function create($productTO) {
        $params = array($productTO->get_PROD_ID(),
            $productTO->get_BRAND_ID(),
            $productTO->get_PROD_NAME(),
            $productTO->get_PROD_UNIT(),
            $productTO->get_PRODS_PER_BOX(),
            $productTO->get_PROD_AVAIL()
        );
        
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }

    function checkProduct($prodName, $brandID) {
        $params = array($prodName, $brandID);
        return DbConfig::readQuery(self::CHECK_QUERY, $params, self::CLASS_NAME);
    }

    function read($productId) {
        $params = array($productId);
        return DbConfig::readQuery(self::READ_QUERY, $params, self::CLASS_NAME);
    }

    function readAll() {
        return DbConfig::readAllQuery(self::READ_ALL_QUERY, self::CLASS_NAME);
    }

    function update($productTO) {
        $params = array($productTO->get_PROD_NAME(), $productTO->get_PROD_AVAIL(), $productTO->get_PROD_ID());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function delete($productId) {
        $params = array($productId);
        DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }

    function readAllByFK($brandID) {
        $params = array($brandID);
        //var_dump(DbConfig::readAllQuery(self::READ_ALL_BY_FK, $params, self::CLASS_NAME));
        return DbConfig::readAllQuery(self::READ_ALL_BY_FK, $params, self::CLASS_NAME);
    }

}
