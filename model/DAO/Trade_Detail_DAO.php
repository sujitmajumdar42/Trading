<?php

class TradeDetailDAO {
    
    const CLASS_NAME = "TradeDetailTO";
    const CREATE_QUERY = "INSERT INTO `trading_db`.`trade_detl` (`TRD_ID`,`PROD_ID`) VALUES (?, ?)";
    const READ_QUERY = "SELECT * FROM `trading_db`.`trade_detl` WHERE `TRD_ID`=? AND `PROD_ID` = ?";
    const READ_ALL_QUERY = "SELECT * FROM `trading_db`.`trade_detl`";
    const UPDATE_QUERY = "UPDATE `trading_db`.`trade_detl` SET `Brand_name` = ? WHERE `trade_detl`.`Brand_Id` = ?";
    const DELETE_QUERY = "DELETE FROM `trading_db`.`brand` WHERE `trade_detl`.`Brand_Id` = ?";

    function create($brandTO) {
        $params = array($brandTO->getBrandID(), $brandTO->getBrandName());
        DbConfig::queryForObject(self::CREATE_QUERY, $params);
    }

    function read($brandId) {
        $params = array($brandId);
        return DbConfig::readQuery(self::READ_QUERY, $params,self::CLASS_NAME);
    }

    function readAll() {
        return DbConfig::readAllQuery(self::READ_ALL_QUERY, self::CLASS_NAME);
    }

    function update($brandTO) {
        $params = array($brandTO->getBrandName(), $brandTO->getBrandID());
        DbConfig::queryForObject(self::UPDATE_QUERY, $params);
    }

    function delete($brandID) {
        $params = array($brandID);
        DbConfig::queryForObject(self::DELETE_QUERY, $params);
    }

}
