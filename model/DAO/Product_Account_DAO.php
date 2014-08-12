<?php

class ProductAccountDAO {

    const CLASS_NAME = "ProdAccountTO";
    const CREATE_QUERY = "INSERT INTO `trading`.`prod_account` (`PROD_ID`, `PROD_UNIT`, `BASIC_COST`,`VAT`,`DISCOUNT`) VALUES (?, ?, ?, ?, ?)";
    const READ_QUERY = "SELECT * FROM `trading`.`prod_account` WHERE `PROD_ID`=? AND `PROD_UNIT`=?";
    const READ_ALL_QUERY = "SELECT * FROM `trading_db`.`prod_account`";
    const UPDATE_QUERY = "UPDATE `prod_account` SET `BASIC_COST` = ?, `VAT` = ?, `DISCOUNT` = ? WHERE `PROD_ID` = ?";
    const DELETE_QUERY = "DELETE FROM `trading_db`.`prod_account` WHERE `prod_account`.`PROD_ID` = ?";

    function create($productAccountTO) {
        $params = array($productAccountTO->get_PROD_ID(),
            $productAccountTO->get_PROD_UNIT(),
            $productAccountTO->get_BASIC_COST(),
            $productAccountTO->get_VAT(),
            $productAccountTO->get_DISCOUNT());
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
        var_dump($productAccountTO);
    }

    function read($ProductId, $unit) {
        $params = array($ProductId, $unit);
        return DbConfig::readQuery(self::READ_QUERY, $params, self::CLASS_NAME);
    }

    function readAll() {
        return DbConfig::readAllQuery(self::READ_ALL_QUERY, self::CLASS_NAME);
    }

    function update($productAccountTO) {
        $params = array($productAccountTO->get_BASIC_COST(),
            $productAccountTO->get_VAT(),
            $productAccountTO->get_DISCOUNT(),
            $productAccountTO->get_PROD_ID());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function delete($productId) {
        $params = array($productId);
        DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }

}
